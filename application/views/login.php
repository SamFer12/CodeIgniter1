<style>
    form{
        text-align: center;
    }

    input{
        margin: 10px;
    }
</style>
<form action="<?=base_url()?>login/auth" method="POST">
    <pre>
Username <input type="text" name="username">
Password <input type="password" name="password">
<button>Kirim</button>
    </pre>
</form>