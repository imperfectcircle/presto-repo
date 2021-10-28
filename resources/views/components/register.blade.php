{{-- Modale di Registrazione --}}
<div id="modalSignup" class="modal">
    <span id="closeSignup" class="modalClose"><i class="fas fa-window-close fa-2x"></i></i></span>
    <form method="POST" action="{{route('register')}}" class="modalContent animate">
        @csrf
        <div class="imgContainer d-flex justify-content-center align-items-center bgColorPrimary">
            <lord-icon src="https://cdn.lordicon.com/imamsnbq.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:250px;height:250px"></lord-icon>
        </div>
        <div id="formContainer" class="container d-flex flex-column justify-content-center align-items-center bgColorSecondary">
            <label for="name">
                <p class="lead textShadow mb-0 mt-2 ms-4">Nome e Cognome</p>
            </label>
            <input type="text" class="formSignInCustom mx-auto shadow text-black" placeholder="Nome e Cognome" name="name">
            <label for="email">
                <p class="lead textShadow mb-0 mt-2 ms-4">Indirizzo mail</p>
            </label>
            <input type="email" class="formSignInCustom mx-auto shadow text-black" placeholder="Inserisci la tua mail" name="email">
            <label for="password">
                <p class="lead textShadow mb-0 mt-2 ms-4">Password</p>
            </label>
            <input type="password" class="formSignInCustom mx-auto shadow text-black" name="password" >
            <label for="checkPassword">
                <p class="lead textShadow mb-0 mt-2 ms-4">Conferma la password</p>
            </label>
                <input type="password" class="formSignInCustom mx-auto shadow text-black" name="password_confirmation">
            <button type="submit"class="btnNavCustom mt-3 mb-3 mx-auto">Registrati</button>
        </div>
    </form>
</div>