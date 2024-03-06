@auth
<div>
    <h3>{{ auth()->user()->name }}</h3>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">
            Logout
        </button>
    </form>
</div>
@endauth