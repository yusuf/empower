{{ Empower::open($form_type, $form_route, $form_extra) }}

    @include($form_view.'._form')

    <div>{{ Form::submit($form_submit) }}</div>

{{ Form::close() }}