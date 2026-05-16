<div class="verify-email-container">
    <h1>Подтвердите ваш E-mail</h1>
    
    <p>
        Мы отправили ссылку для подтверждения на вашу почту. 
        Если вы не получили письмо, мы можем отправить его повторно.
    </p>
    @if (session('message') == 'Verification link sent!')
        <div style="color: green; margin-bottom: 15px;">
            Новая ссылка для подтверждения была отправлена на ваш адрес.
        </div>
    @endif

    <div class="actions">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit">Отправить письмо повторно</button>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background: none; border: none; color: blue; cursor: pointer;">
                Выйти из аккаунта
            </button>
        </form>
    </div>
</div>