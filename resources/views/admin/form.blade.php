
<h1>Form email</h1>
<form action="{{route('register.store')}}" method="post">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="random" required>
        @error('name')
        <div>{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Email</button>
</form>
