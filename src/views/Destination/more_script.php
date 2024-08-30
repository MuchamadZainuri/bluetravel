<script>
    $(document).ready(function() {
        const getCheckedValue = ($input) => ($input.is(':checked') ? parseFloat($input.val()) : 0);

        const hitungPackPrice = () => {
            const hotelPrice = getCheckedValue($('#hotel'));
            const foodPrice = getCheckedValue($('#food'));
            const transportationPrice = getCheckedValue($('#transportation'));
            return hotelPrice + foodPrice + transportationPrice;
        };

        const hitungTotalPrice = () => {
            const duration = parseInt($('#duration').val()) || 0;
            const totalPeople = parseInt($('#total_people').val()) || 0;

            const basePricePerDay = parseInt($('#destination').data('price')) || 0;

            const packagePrice = hitungPackPrice();
            const durationPrice = basePricePerDay * totalPeople;
            const totalPrice = ( packagePrice * duration) + durationPrice;

            if (duration > 0 && totalPeople > 0 && packagePrice > 0) {
                $('#result').removeClass('hidden').addClass('flex');
            } else {
                $('#result').removeClass('flex').addClass('hidden');
            }

            $('#package_price').val(packagePrice);
            $('#total_price').val(totalPrice);
            $('#display_total_price').text('Rp. ' + totalPrice.toLocaleString('id-ID'));
        };

        const addEventListeners = () => {
            $('#duration').on('input', hitungTotalPrice);
            $('#total_people').on('input', hitungTotalPrice);
            $('#destination').on('change', hitungTotalPrice);
            $('#hotel').on('change', hitungTotalPrice);
            $('#food').on('change', hitungTotalPrice);
            $('#transportation').on('change', hitungTotalPrice);
        };

        addEventListeners();
    });
</script>