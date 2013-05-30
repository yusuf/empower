<?php

class SupportModelTest extends TestCase {

    protected $model;

    protected $eloquent;

    public function setUp()
    {
        parent::setUp();

        $this->model = $model = new \Sorora\Empower\Models\SupportModel;

        $model::$rules = array('email' => 'required');
    }
    
    public function tearDown()
    {
        Mockery::close();
    }

    /**
     * Does the validation return true if it passes
     *
     * @return void
     */
    public function testReturnsTrueIfValidationPasses()
    {
        Validator::shouldReceive('make')->once()->andReturn(
            Mockery::mock(array('passes' => true))
        );

        $this->model->email = 'Foo Title';
        $result = $this->model->validate();

        $this->assertEquals(true, $result);
    }

    /**
     * Does the validation set errors on validation failure
     *
     * @return void
     */
    public function testSetsErrorsOnObjectIfValidationFails()
    {
        Validator::shouldReceive('make')->once()->andReturn(
            Mockery::mock(array('passes' => false, 'messages' => 'messages'))
        );

        $result = $this->model->validate();
        
        $this->assertEquals(false, $result);
        $this->assertEquals('messages', $this->model->errors);
    }

    /**
     * Does the validation set errors on validation failure
     *
     * @return void
     */
    public function testsRulesUpdatedOnUniqueExcept()
    {
        $model = $this->model;
        $model->id = $id = 1;

        $original = 'unique:tables,email';

        $model::$rules = array('email' => $original);

        $model->uniqueExcept('email');

        $this->assertEquals($original.','.$id, $model::$rules['email']);
    }
}