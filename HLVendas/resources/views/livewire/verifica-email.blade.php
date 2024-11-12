<div>
    <!-- <label for="email">Email</label> -->
    <div class="contenInput">
        <input class="inputWrapper" type="search" name="email" wire:model.live="email" required>
        <label for="email" class="userLabel">
            <p>Email</p>
        </label>
    </div>
    @if($indisponivel)
        <!-- <i class="fa-solid fa-xmark"></i> -->
        <h3>O email inserido já está sendo utilizado</h3>
        <input type="text" required hidden>
    @elseif($user)
        <i class="fa-solid fa-check"></i>
        <input type="text" class="inputWrapper" value="{{$user->name}}" disable>
        <input type="number" name="idauth" value="{{$user->id}}" hidden>
    @elseif($email == '')
        <!-- <i class="fa-solid fa-xmark"></i> -->
        <input type="text" required hidden>
    @else
        <!-- <i class="fa-solid fa-xmark"></i> -->
        <h3>Insira um e-mail válido</h3>
        <input type="text" required hidden>
    @endif
</div>