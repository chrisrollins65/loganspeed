<p>Nuevo mensaje desde el formulario de contacto de Logan Speed:</p>

<p><strong>Nombre:</strong> {{ $name }}</p>
<p><strong>Email:</strong> {{ $email }}</p>
<p><strong>Mensaje:</strong><br />{!! nl2br(e($body)) !!}</p>

<p style="color:#999999; font-style:italic;">Enviado desde {{ config('app.url') }}</p>