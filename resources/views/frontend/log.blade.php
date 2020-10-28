@extends('frontend.header')
@section('log')
    <div class="container">
        <div class="container  justify-content-center text-black" id="log">
            <h3>Личные данные профиля
                <button type="submit" title="Выход" id="exit" class="btn btn-outline-secondary"><i
                        class="fas fa-sign-out-alt" aria-hidden="true"></i></button>
            </h3>
            @if(!empty($userinfo))@foreach($userinfo as $value)
                <div id="prof-info">
                    <img src="{{asset('/storage/'.$value->titleimg)}}" class="rounded-circle" id="photo-prof"
                         width="160"
                         height="160">
                    <h5>{{$value->name}}</h5>
                    <div class="card Infouserl ">
                        <div class="card-body ">
                            <ul class="h6">Информация:</ul>
                            <ul>Email: {{$value->email}}</ul>
                            <ul>Name: {{$value->name}}
                                <button type="button" data-toggle="modal" data-target="#formuseruploud"
                                        data-toggle="userupload"
                                        data-name="{{$value->name}}"
                                        data-email="{{$value->email}}" data-placement="bottom" title="Редактировать"
                                        id="foruseruploud" class="btn btn-outline-secondary"><i class="fa fa-pencil"
                                                                                                aria-hidden="true"></i>
                                </button>
                            </ul>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
        </div>

    </div>
    <div class="modal fade container-fluid" id="exampleModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="upimg" enctype="multipart/form-data" name="formName">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel">Выбери фотографию</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body " id="log-modal-body">
                        <input type="file" id="file" name="filename">
                        <button class="btn btn-outline-dark"
                                id="submitButton" type="submit" name='btnSubmit'
                                value="Submit Image">Загрузить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <form id="form-useruploud">
        @csrf
        <div id="formuseruploud" class="modal fade " tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Редактировать</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="order-md-2">
                            <div class="form-group">
                                <label for="name">Изменить имя</label>
                                <input type="text" name="name" placeholder="Введите имя" id="name"
                                       class="form-control modal-field-name" value="">
                            </div>
                            <div class="form-group">
                                <label for="email">Изменить Email</label>
                                <input type="text" name="email" placeholder="Email" id="email"
                                       class="form-control modal-field-email" value="">
                            </div>
                            <button type="submit" title="Редактировать" data-dismiss="modal"
                                    class="btn btn-outline-secondary  uppass">Пароль<i class="fa fa-key"
                                                                                       aria-hidden="true"></i></button>
                            <button type="submit" class="btn btn-dark">Отправить!
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form id="form-useruploud-pass">
        @csrf
        <div id="form-useraploud-pass" class="modal fade animate__animated animate__backInRight" tabindex="-1"
             role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Изменить</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="order-md-2">
                            <div class="form-group">
                                <label for="oldpassword">Введите новый пароль</label>
                                <input type="text" name="oldpassword" id="oldpassword" placeholder="Новый пароль"
                                       class="form-control modal-field-phone" value="">
                            </div>
                            <div class="form-group">
                                <label for="newpassword">Новый пароль</label>
                                <input type="text" name="newpassword" id="newpassword" placeholder="Повторите пароль"
                                       class="form-control modal-field-htoto" value="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark">Отправить!
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <script>
        $(document).ready(function () {
            $(document).on('click', '.rounded-circle', function () {
                $("#exampleModal").modal('show');
            })
            $(document).on('click', '#exit', function () {
                $.ajax({
                    url: '{{route('exit')}}',
                    success: function () {
                        window.location.href = "/auto";
                    }

                });
            })
            $(document).on('click', '.uppass', function () {
                $('#formuseruploud').addClass('modal fade animate__animated animate__backOutLeft');
                setTimeout(openPass, 100);
                setTimeout(closeModel, 3000);

                function closeModel() {
                    $('#formuseruploud').removeClass('animate__animated animate__backOutLeft ');
                }

                function openPass() {
                    $("#form-useraploud-pass").modal('show');
                }

            })

            $(document).on('submit', '#upimg', function (event) {
                event.preventDefault();
                const uploadFile = document.querySelector('input[type=file]');
                const formData = new FormData();
                formData.append('image', uploadFile.files[0])

                $.ajax({
                    url: '{{route('update-image')}}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        console.log(response.error);

                    }
                });
            })
            $(document).on('click', '#foruseruploud ', function () {
                $('.modal-field-name').val($(this).data('name'));
                $('.modal-field-email').val($(this).data('email'));
            })
            $('#form-useruploud-pass').submit(function (event) {
                event.preventDefault();
                var password = $('#oldpassword').val();
                var passwordConfirm = $('#newpassword').val();

                $(".error").remove();
                if (password.length < 8) {
                    $('#oldpassword').after('<span class="error text-danger">Пароль должен быть больше 8 символов </span>');
                    validOldPass = false;
                } else {
                    validOldPass = true;
                }
                if (password !== passwordConfirm) {
                    $('#newpassword').after('<span class="error text-danger">Пароли не совпадают </span>');
                    validNewPass = false;
                } else {
                    validNewPass = true;
                }

                if (validNewPass == true) {
                    console.log($('#form-useruploud-pass').serialize());
                    $.ajax({
                        url: '/changePass',
                        type: "POST",
                        data: $('#form-useruploud-pass').serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            {
                                if ('success' in response) {
                                    alert('Красиво!');
                                }
                                if ('errorPass' in response) {
                                    $('#oldpassword').after('<span class="error text-danger">Нельзя использовать старый пароль</span>');
                                }

                            }

                        }
                    });
                }
            })


            $('#form-useruploud').submit(function (event) {
                event.preventDefault();
                var name = $('#name ').val();
                var email = $('#email').val();
                var password = $('#oldpassword').val();
                var passwordConfirm = $('#newpassword').val();

                $(".error").remove();

                if (name.length < 3) {
                    $('#name').after('<span class="error text-danger">Имя должно быть больше 3 букв </span>');
                    validName = false;
                } else {
                    validName = true;
                }
                if (password !== passwordConfirm) {
                    $('#newpassword').after('<span class="error text-danger">Пароли не совпадают </span>');
                    validNewPass = false;
                } else {
                    validNewPass = true;
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
                if (validName == true && validEmail == true && validNewPass == true) {
                    console.log($('#form-useruploud').serialize());
                    $.ajax({
                        url: '/changelog',
                        type: "POST",
                        data: $('#form-useruploud').serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            {
                                if ('success' in response) {
                                    alert('Success');
                                }
                                if ('errorEmail' in response) {
                                    alert('Ups');
                                }

                            }

                        }
                    });
                }
            })
        })
    </script>
@endsection
