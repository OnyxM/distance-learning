<div class="modal fade" id="payForLevel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('init-payment') }}" method="POST" id="placePaymentForm">
            @csrf
            <input type="hidden" name="field" value="{{$field->id}}" required>
            <input type="hidden" name="level" value="{{$level->id}}" required>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Make Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h3>{{ $field->name. " - ". $level->name }}</h3>
                    <label>You are about to pay <strong>{{ number_format($level->pension) }} XAF</strong> to attend this class</label><br>
                </div>
                <div class="form-group">
                    <label>Phone Number <sup class="text-danger">*</sup></label>
                    <input type="text" class="form-control text-center" name="phone" required placeholder="699508197">
                </div>
            </div>
            <div class="error-container text-center" id="info-container"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Pay</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).on('submit', "#placePaymentForm", function(evt){
        evt.preventDefault();

        let fa = $(this),
            infoContainer = $("#info-container");

        infoContainer.removeClass("text-danger"); infoContainer.removeClass("text-success"); infoContainer.empty();

        infoContainer.html(loader);

        $.ajax({
            type: 'post',
            url: fa.attr('action'),
            data: fa.serialize(),
            datatype: 'json',
            statusCode: {
                422: function(e){
                    infoContainer.empty();
                    let errors = e.responseJSON.message;

                    infoContainer.addClass("text-danger");
                    infoContainer.html(errors);

                },
                200: function(response){
                    infoContainer.empty();
                    infoContainer.addClass("text-primary");
                    infoContainer.html(response.message);

                    if(response.paymentId != undefined){
                        yourFunction(response.paymentId);
                    }
                },
            }
        });
    });

    function yourFunction(paymentId){

        $.ajax({
            type: 'post',
            url: "{{ route('check-payment') }}",
            data: "payment_id="+paymentId,
            datatype: 'json',
            statusCode: {
                200: function(response){
                    if(response.message == "Payment pending"){
                        setTimeout(yourFunction(paymentId), 5000);
                    }
                    else if(response.message == "Payment succeeded"){
                        let infoContainer = $("#info-container");

                        infoContainer.empty();
                        infoContainer.addClass("text-success");
                        infoContainer.removeClass("text-danger");
                        infoContainer.html(response.message);

                        setTimeout(location.reload(), 5000);
                    }
                    else {
                        let infoContainer = $("#info-container");

                        infoContainer.empty();
                        infoContainer.addClass("text-danger");
                        infoContainer.removeClass("text-success");
                        infoContainer.html(response.message);

                        setTimeout(location.reload(), 5000);
                    }
                },
            }
        });
    }
</script>
