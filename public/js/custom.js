$(document).ready(function () {

    $(".currency").inputmask({
        alias: "numeric",
        groupSeparator: ".",
        removeMaskOnSubmit: true
    });

    $(".numb").inputmask({
        alias: "numeric",
        // groupSeparator: ".",
        removeMaskOnSubmit: true
    });

    $('.select2').select2({
        width: '100%'
    });

    $('input[name="tgltrn"]').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });

    function terbilang(nilai) {
        nilai = Math.floor(Math.abs(nilai));
        var huruf = [
            '',
            'Satu',
            'Dua',
            'Tiga',
            'Empat',
            'Lima',
            'Enam',
            'Tujuh',
            'Delapan',
            'Sembilan',
            'Sepuluh',
            'Sebelas',
        ];

        var bagi = 0;
        var penyimpanan = '';
        if (nilai < 12) {
            penyimpanan = ' ' + huruf[nilai];
        } else if (nilai < 20) {
            penyimpanan = terbilang(Math.floor(nilai - 10)) + ' Belas';
        } else if (nilai < 100) {
            bagi = Math.floor(nilai / 10);
            penyimpanan = terbilang(bagi) + ' Puluh' + terbilang(nilai % 10);
        } else if (nilai < 200) {
            penyimpanan = ' Seratus' + terbilang(nilai - 100);
        } else if (nilai < 1000) {
            bagi = Math.floor(nilai / 100);
            penyimpanan = terbilang(bagi) + ' Ratus' + terbilang(nilai % 100);
        } else if (nilai < 2000) {
            penyimpanan = ' Seribu' + terbilang(nilai - 1000);
        } else if (nilai < 1000000) {
            bagi = Math.floor(nilai / 1000);
            penyimpanan = terbilang(bagi) + ' Ribu' + terbilang(nilai % 1000);
        } else if (nilai < 1000000000) {
            bagi = Math.floor(nilai / 1000000);
            penyimpanan = terbilang(bagi) + ' Juta' + terbilang(nilai % 1000000);
        } else if (nilai < 1000000000000) {
            bagi = Math.floor(nilai / 1000000000);
            penyimpanan = terbilang(bagi) + ' Miliar' + terbilang(nilai % 1000000000);
        } else if (nilai < 1000000000000000) {
            bagi = Math.floor(nilai / 1000000000000);
            penyimpanan = terbilang(nilai / 1000000000000) + ' Triliun' + terbilang(nilai % 1000000000000);
        }
        return penyimpanan;
    }

    function generator_kode(length) {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < length) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            counter += 1;
        }
        return result;
    }

});