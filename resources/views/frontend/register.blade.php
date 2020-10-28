@extends('frontend.header')
@section('register')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" id="registeruser">
                <div class="card text-black">
                    <div class="card-header text-center"><h4>Регистрация</h4></div>

                    <div class="card-body">
                        <form id="regist">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" value="" required=""
                                           autocomplete="name" autofocus="">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Почта</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control " name="email" value=""
                                           required="" autocomplete="email">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control " name="password"
                                           required="" autocomplete="new-password">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Повторите
                                    пароль</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password-confirm" required="" autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark">
                                        Зарегистрироваться
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(document).on('submit', '#regist', function (event) {
                event.preventDefault();
                var name = $('#name ').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var passwordConfirm = $('#password-confirm').val();


                $(".error").remove();

                if (name.length < 3) {
                    $('#name').after('<span class="error text-danger">Имя должно быть больше 3 букв </span>');
                    validName = false;
                } else {
                    validName = true;
                }
                if (email.length < 1) {
                    $('#email').after('<span class="error text-danger">Введите почту</span>');
                    validEmail = false;
                } else {
                    var regEx = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                    var validEemail = regEx.test(email);
                    if (!validEemail) {
                        $('#email').after('<span class="error text-danger">Введена не корректная почта</span>');
                        validEmail = false;
                    } else {
                        validEmail = true;
                    }
                }
                if (password.length < 7) {
                    $('#password').after('<span class="error text-danger">Введите пароль</span>');
                    validPassword = false;
                } else {
                    validPassword = true;
                }
                if (passwordConfirm !== password) {
                    $('#password-confirm').after('<span class="error text-danger">Пароли на совпадают</span>');
                    validPasswordConfirm = false;
                } else {
                    validPasswordConfirm = true;
                }

                if (validName == true && validEmail == true && validPassword == true && validPasswordConfirm == true) {
                    console.log($('#formtest').serialize());
                    $.ajax({
                        url: '/register',
                        type: "POST",
                        data: $('#regist').serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            {

                                if ('success' in response) {
                                    window.location.href = "/auto";

                                } else {
                                    alert('Данная почта уже занята ');
                                }

                            }
                        }
                    });


                }
            });
        })
    </script>
@endsection
