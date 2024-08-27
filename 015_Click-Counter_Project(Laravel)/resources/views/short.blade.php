<h1> Short URL </h1>

<form action="{{ url('/short/2') }}" method="POST">
    @csrf
    <input type="text" name="url">
    <br>
    <button type="submit"> Short URL </button>
</form>