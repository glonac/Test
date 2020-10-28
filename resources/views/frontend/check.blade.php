@extends('frontend.header')
@section('check')

    <form class="form-inline " id="searching">
        @csrf
        <input class="form-control mr-sm-4" type="search" method="post" name="search" placeholder="Поиск"
               aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        <button type="button" data-toggle="modal" data-target="#filter" data-toggle="filter" data-placement="bottom"
                title="Фильтр" id="forfilter" class="btn btn-outline-success my-2 my-sm-0"><i class="fa fa-filter "
                                                                                              aria-hidden="false"></i>
        </button>
    </form>
    <div class="container-fluid" id="table">
        <table class="table table-striped ">
            <thead>
            <tr>
                <th scope="col ">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Почта</th>
                <th scope="col">Номер телефона</th>
                <th scope="col">Что то</th>
                <th scope="col">Комментарий</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($testList))@foreach($testList as $value)
                <tr id="record-{{$value->id}}">
                    <th scope="row">{{$value->id}}</th>
                    <td class="record-name">{{$value->name}}</td>
                    <td class="record-email">{{$value->email}}</td>
                    <td class="record-phone">{{$value->phone}}</td>
                    <td class="record-htoto">{{$value->htoto}}</td>
                    <td class="record-comment">{{$value->comment}}</td>
                    <td>
                        <button type="button" class="btn  btn-dark german change" data-toggle="modal"
                                data-target="#exampleModalCenter" data-name="{{$value->name}}"
                                data-email="{{$value->email}}" data-phone="{{$value->phone}}"
                                data-htoto="{{$value->htoto}}"
                                data-comment="{{$value->comment}}" output-id="{{$value->id}}">
                            <i class="fas fa-edit"></i>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger table-delete-btn" record-id="{{$value->id}}"><i
                                class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <form id="filter-form">
        @csrf
        <div id="filter" class="modal fade" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Фильтры</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="order-md-2">
                            <div class="form-group">
                                <label for="comment">Добавить комментарий</label>
                                <input type="text" name="comment" placeholder="Поиск по комментарию" id="comment"
                                       class="form-control ">
                            </div>
                            <div class="form-group">
                                <label for="email">По email</label>
                                <input type="text" name="email" placeholder="@glonas как пример" id="email"
                                       class="form-control ">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark">Применить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form id="update-form">
        @csrf
        <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog"
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
                                <label for="name">Введите имя</label>
                                <input type="text" name="name" placeholder="Введите имя" id="name"
                                       class="form-control modal-field-name" value="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" placeholder="Email" id="email"
                                       class="form-control modal-field-email" value="">
                            </div>
                            <div class="form-group">
                                <label for="phone">Номер телефона</label>
                                <input type="text" name="phone" id="phone" placeholder="Номер телефона"
                                       class="form-control modal-field-phone" value="">
                            </div>
                            <div class="form-group">
                                <label for="htoto">Что-то еще</label>
                                <input type="text" name="htoto" id="htoto" placeholder="Что угодно"
                                       class="form-control modal-field-htoto" value="">
                            </div>
                            <div class="form-group">
                                <label for="comment">Комментарий</label>
                                <textarea type="text" class="form-control modal-field-comment" name="comment"
                                          id="comment" rows="3" placeholder="Комментарий" value=""></textarea>
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
            $(document).on('click', '.table-delete-btn', function () {
                $.get('/delete/' + $(this).attr('record-id'), '', function (response) {
                    alert('Delete');
                })

            });
            $(document).on('submit', '#searching , #filter-form', function (event) { //Поиск по фильтру
                event.preventDefault();
                let data = $(this).serialize();
                let eventObj = event.target;
                if (eventObj.id == 'filter-form') {
                    data = data + '&search=' + $('input[name=search]').val();
                }
                $.ajax({
                    url: 'http://' + location.hostname + '/search',
                    type: "POST",
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: (function (response) { //Вывод найденных данных
                        $("tbody").empty();
                        for (var i = 0; i < response.data.length; i++) {
                            $('tbody').append('<tr id="record-' + response.data[i].id + '">');
                            $('tbody').append('<th scope="row">' + response.data[i].id + '</th>\n');
                            $('tbody').append('<td class="record-name">' + response.data[i].name + '</td>');
                            $('tbody').append('<td class="record-email">' + response.data[i].email + '</td>');
                            $('tbody').append('<td class="record-phone">' + response.data[i].phone + '</td>');
                            $('tbody').append('<td class="record-htoto">' + response.data[i].htoto + '</td>');
                            $('tbody').append('<td class="record-comment">' + response.data[i].comment + '</td>');
                            $('tbody').append(' <td>\n' +
                                '                    <button type="button" class="btn  btn-dark german change" data-toggle="modal"\n' +
                                '                            data-target="#exampleModalCenter" data-name="' + response.data[i].name + '"\n' +
                                '                            data-email="' + response.data[i].email + '" data-phone="' + response.data[i].phone + '" data-htoto="' + response.data[i].htoto + '"\n' +
                                '                            data-comment="' + response.data[i].comment + '" output-id="' + response.data[i].id + '">\n' +
                                '                         <i class="fas fa-edit"></i>\n' +
                                '                    </button>\n' +
                                '                </td>\n' +
                                '                <td>\n' +
                                '                    <button class="btn btn-danger table-delete-btn" record-id="' + response.data[i].id + '"><i\n' +
                                '                            class="fas fa-trash"></i></button>\n' +
                                '                </td>')
                            $('tbody').append('</tr>');
                        }

                    })
                })
            })
            $(document).on('click', '.change ', function () {
                $('#update-form').attr('id', $(this).attr('output-id'));
                $('.modal-field-name').val($(this).data('name'));
                $('.modal-field-email').val($(this).data('email'));
                $('.modal-field-phone').val($(this).data('phone'));
                $('.modal-field-htoto').val($(this).data('htoto'));
                $('.modal-field-comment').val($(this).data('comment'));
            });


            $('#update-form').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: '/products/update/' + $(this).attr('id'),
                    type: "post",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: (function (response) {
                        if (response.hasOwnProperty('data')) {
                            $('#record-' + response.data.id).find('td').each(function () {
                                if ($(this).hasClass('record-name')) {
                                    $(this).html(response.data.name);
                                }
                                if ($(this).hasClass('record-email')) {
                                    $(this).html(response.data.email);
                                }
                                if ($(this).hasClass('record-phone')) {
                                    $(this).html(response.data.phone);
                                }
                                if ($(this).hasClass('record-htoto')) {
                                    $(this).html(response.data.htoto);
                                }
                                if ($(this).hasClass('record-comment')) {
                                    $(this).html(response.data.comment);
                                }
                            })
                        }
                    })
                })

            });
        });
    </script>
@endsection

