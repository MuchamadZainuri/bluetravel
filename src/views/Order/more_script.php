<script>
    $(document).ready(function() {
        const getCheckedValue = ($input) => ($input.is(':checked') ? parseFloat($input.val()) : 0);

        const hitungPackPrice = (id) => {
            const hotelPrice = getCheckedValue($(`#hotel_${id}`));
            const foodPrice = getCheckedValue($(`#food_${id}`));
            const transportationPrice = getCheckedValue($(`#transportation_${id}`));
            return hotelPrice + foodPrice + transportationPrice;
        };

        const hitungTotalPrice = (id) => {
            const duration = parseInt($(`#duration_${id}`).val()) || 0;
            const totalPeople = parseInt($(`#total_people_${id}`).val()) || 0;

            const basePricePerDay = parseInt($(`#destination_${id}`).find('option:selected').data('price')) || 0;

            const packagePrice = hitungPackPrice(id);
            const durationPrice = basePricePerDay * totalPeople;
            const totalPrice = (packagePrice * duration) + durationPrice;

            if (packagePrice > 0 && duration > 0 && totalPeople > 0) {
                $(`#result_${id}`).removeClass('hidden').addClass('grid');
            } else {
                $(`#result_${id}`).removeClass('grid').addClass('hidden');
            }

            $(`#package_price_${id}`).val(packagePrice);
            $(`#display_package_price_${id}`).text('Rp. ' + packagePrice.toLocaleString('id-ID'));

            $(`#total_price_${id}`).val(totalPrice);
            $(`#display_total_price_${id}`).text('Rp. ' + totalPrice.toLocaleString('id-ID'));
        };

        const addEventListeners = (id) => {
            $(`#duration_${id}`).on('input', () => hitungTotalPrice(id));
            $(`#total_people_${id}`).on('input', () => hitungTotalPrice(id));
            $(`#destination_${id}`).on('change', () => hitungTotalPrice(id));
            $(`#hotel_${id}`).on('change', () => hitungTotalPrice(id));
            $(`#food_${id}`).on('change', () => hitungTotalPrice(id));
            $(`#transportation_${id}`).on('change', () => hitungTotalPrice(id));
        };

        addEventListeners('add');
        hitungTotalPrice('add');

        $('[id^="form_"]').each(function() {
            const id = $(this).attr('id').split('_')[1];
            addEventListeners(id);
            hitungTotalPrice(id);
        });
    });
</script>