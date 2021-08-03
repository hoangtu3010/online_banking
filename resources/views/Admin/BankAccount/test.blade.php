



<div class="container">
    <form action="{{url("admin/test/login")}}" method="post">
    <div class="form-control">
        @csrf
        <label for="">Stk:</label>
        <input type="text" name="stk">
    </div> <div class="form-control">
        <label for="">pass:</label>
        <input type="text" name="password">
    </div>
        <button type="submit">login</button>
    </form>
</div>
