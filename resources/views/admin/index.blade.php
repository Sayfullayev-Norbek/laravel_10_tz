<h1>Admin panel</h1>
<h1><?=$user['id']?></h1>
 <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
 </form>
