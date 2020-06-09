<!-- Modal -->
<div class="modal fade" id="modal-order-view-apartment" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: 0;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h4 class="modal-title text-center mrg-btm-30">Заказ просмотра</h4>
                <form role="form" action="{{ route('order.view.apartment') }}" method="POST" id="orderForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 mrg-btm-30">
                                <input type="text" name="name" class="form-control order-input" placeholder="Ваше имя">
                            </div>

                            <div class="col-md-8 col-md-offset-2">
                                <input type="text" name="phone" class="form-control order-input" placeholder="Ваш номер">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 0;">
                <button type="submit" form="orderForm" class="btn btn-danger">Заказать</button>
            </div>
        </div>

    </div>
</div>

@push('js')
    <script>
        $('#orderForm').submit(function (e) {
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    console.log('Submission was successful.');
                    console.log(data);
                    $('#modal-order-view-apartment').modal('toggle');
                    swal({
                        title: 'Успешно !',
                        text: 'Мы свяжемся с Вами в самое ближайшее время',
                        type: 'success',
                        confirmButtonText: 'Спасибо'
                    })
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                    swal({
                        title: 'Error!',
                        text: 'Произошла ошибка отправки данных, проверьте правильность заполнения полей',
                        type: 'error',
                        confirmButtonText: 'Ок'
                    })
                }
            });
            e.preventDefault();
        });
    </script>
@endpush