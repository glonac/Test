@extends('frontend.header')
@section('test')
    <div class="container-fluid col-xs-12 cool-sm-3 col-md-6 col-lg-4" id="contenttest">
        <div class="modal fade container-fluid" id="ready" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <img
                    src="https://www.kastatic.org/images/badges/meteorite/thumbs-up-512x512.png"
                    class="rounded-circle animate__animated animate__bounceInDown" id="test-img" width="160"
                    height="160">
                <h3 class="text-white animate__animated animate__bounceInUp">Ready</h3>
            </div>
        </div>
        <form id="formtest">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Имя">
            </div>
            <div class="form-group">
                <label for="email">Почта</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="8-999-999-99-99">
            </div>
            <div class="form-group">
                <label for="htoto">Что-то еще</label>
                <input type="text" class="form-control" name="htoto" id="htoto" placeholder="Что угодно">
            </div>
            <div class="form-group">
                <label for="comment">Комментарий</label>
                <textarea type="text" class="form-control" name="comment" id="comment" rows="3"
                          placeholder="Комментарий"></textarea>
            </div>

            <button type="submit" class="btn btn-dark">Отправить!
            </button>
        </form>
    </div>
    <script>

        $(document).ready(function () {
            $(document).on('click', '#ready', function () {
                $(this).modal('hide');

            })
            var validName = false;
            var validEmail = false;
            var validComment = false;
            var validPhone = false;
            var validHtoto = false;

            $(document).ready(function () { //Валидация формы
                $('#formtest').submit(function (event) {
                    event.preventDefault();
                    var name = $('#name ').val();
                    var comment = $('#comment').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var htoto = $('#htoto').val();


                    $(".error").remove();

                    if (name.length < 3) {
                        $('#name').after('<span class="error text-danger">Имя должно быть больше 3 букв </span>');
                        validName = false;
                    } else {
                        validName = true;
                    }

                    if (comment.length < 3) {
                        $('#comment').after('<span class="error text-danger">Вид услуги должен быть больше 3 букв</span>');
                        validComment = false;
                    } else {
                        validComment = true;
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

                    if (phone.length < 1) {
                        $('#phone').after('<span class="error text-danger">Введите номер телефона</span>');
                        validPhone = false;
                    } else {
                        validPhone = true;
                    }
                    if (phone.length < 1) {
                        $('#htoto').after('<span class="error text-danger">Ввидите что-то</span>');
                        validHtoto = false;
                    } else {
                        validHtoto = true;
                    }

                    if (validName == true && validEmail == true && validComment == true && validPhone == true && validHtoto == true) {
                        console.log($('#formtest').serialize());
                        $.ajax({
                            url: '/posts',
                            type: "POST",
                            data: $('#formtest').serialize(),
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (response) {
                                console.log(response.success);
                                $("#ready").modal('show');
                            }
                        });


                    }
                });
            });
        });
    </script>
@endsection
