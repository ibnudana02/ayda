<?= $this->extend('layout/template') ?>
<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?> </h3>
                    </div>
                    <div class="card-body">
                        <?= form_open(current_url(), ['id' => 'form_create_trx']) ?>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-3">
                                <input type="hidden" name="multi" value="1">
                                <input type="hidden" name="kdktr" id="kdktr">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tgltrn" id="tgltrn" autocomplete="off">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="dynamic_form_dr">
                            <div class="form-group row baru-data">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Rek | DR | Nominal</label>
                                <div class="col-sm-2">
                                    <select name="drtype[]" id="drtype" class="form-control select2">
                                        <option value="">Pilih</option>
                                        <option value="drsbb">SBB</option>
                                        <option value="drtab">Tabungan</option>
                                        <option value="drdep">Deposito</option>
                                        <option value="drpby">Pembiayaan</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input type="hidden" name="dnama[]" id="dnm">
                                    <select name="dnorek[]" id="drek" class="form-control select2">
                                        <option value="null">Pilih</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="nominal_dr[]" autocomplete="off" class="form-control currency" placeholder="0.00">
                                </div>
                                <div class="button-group">
                                    <button type="button" class="btn btn-sm btn-success btn-tambah"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="ket" id="ket" cols="10" rows="1"><?= set_value('ket') ?></textarea>
                            </div>
                        </div>
                        <div id="dynamic_form_cr">
                            <div class="form-group row baru-data">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Rek | CR | Nominal</label>
                                <div class="col-sm-2">
                                    <select name="crtype[]" id="crtype" class="form-control select2">
                                        <option value="">Pilih</option>
                                        <option value="crsbb">SBB</option>
                                        <option value="crtab">Tabungan</option>
                                        <option value="crdep">Deposito</option>
                                        <option value="crpby">Pembiayaan</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <input type="hidden" name="cnama[]" id="cnm">
                                    <select name="cnorek[]" id="crek" class="form-control select2">
                                        <option value="">Pilih</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="nominal_cr[]" autocomplete="off" class="form-control currency nom_cr" placeholder="0.00">
                                </div>
                                <div class="button-group">
                                    <button type="button" class="btn btn-sm btn-success btn-tambah"><i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9"></div>
                            <div class="col-sm-2">
                                <input type="text" name="balanced" id="balanced" autocomplete="off" readonly class="form-control currency" placeholder="0.00">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-cart-arrow-down"></i> Simpan</button>
                            <?= form_close() ?>
                            <button id="btn-print" type="button" class="btn btn-success"> <i class="fas fa-print"></i> Simpan - Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<script>
    var base_url = '<?= base_url('transaction/') ?>';
    var user_loc = '<?= $user_loc ?>'
</script>
<script>
    $(document).ready(function() {
        let countCr = countDr = 1;

        $('#kdktr').val(user_loc);

        $('input[name="tgltrn"]').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });

        $('.select2').select2({
            width: '100%',
        });

        $(".currency").inputmask({
            alias: "numeric",
            groupSeparator: ".",
            removeMaskOnSubmit: true
        });

        function sumArray(field) {
            var total = 0;
            var arr = $('input[name="' + field + '"]').map(function() {
                return parseFloat(this.value.replaceAll(',', ''));
            }).get();
            for (let index = 0; index < arr.length; index++) {
                total += arr[index];
            }
            return total;
        }

        $('.nom_cr').blur(function() {
            var total_dr = sumArray('nominal_dr[]');
            var total_cr = sumArray('nominal_cr[]');
            var balanced = parseFloat(total_dr - total_cr);
            $('#balanced').val(balanced);
        });

        function switch_rek(rek) {
            switch (rek) {
                case 'sbb':
                    var frek = 'sbb';
                    break;
                case 'tab':
                    var frek = 'tabungan';
                    break;
                case 'dep':
                    var frek = 'deposito';
                    break;
                case 'pby':
                    var frek = 'toflmb';
                    break;
            }
            return frek;
        }

        function setRek(rek, field, kdktr) {
            var pre_sbb = (rek == 'sbb') ? '5' + kdktr : '';
            $('#' + field).select2({
                placeholder: '--- Cari Rekening ---',
                ajax: {
                    url: base_url + "search/" + rek,
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: data.map(function(item) {
                                return {
                                    id: pre_sbb + item.id,
                                    text: pre_sbb + item.id + " ~ " + item.text
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        }

        $('#crtype').change(function() {
            var crek = $('#crtype').val();
            setRek(switch_rek(crek.substring(2)), 'crek', user_loc);
        });

        $('#drtype').change(function() {
            var drek = $('#drtype').val();
            setRek(switch_rek(drek.substring(2)), 'drek', user_loc);
        });

        $('#crek').change(function() {
            var data = $('#crek').select2('data');
            var txt = data[0].text;
            var pisah = txt.split("~");
            $('#cnm').val(pisah[1]);
        });

        $('#drek').change(function() {
            var data = $('#drek').select2('data');
            var txt = data[0].text;
            var pisah = txt.split("~");
            $('#dnm').val(pisah[1]);
        });

        function addCr(bykrow) {
            var form_trx = '<div class="form-group row baru-data">\
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Rek | CR | Nominal</label>\
                        <div class="col-sm-2"><select name="crtype[]" id="crtype' + bykrow + '" class="form-control select2">\
                            <option value="null">Pilih</option><option value="crsbb">SBB</option><option value="crtab">Tabungan</option><option value="crdep">Deposito</option><option value="crpby">Pembiayaan</option>\
                        </select></div>\
                        <div class="col-sm-4"><input type="hidden" name="cnama[]" id="cnm' + bykrow + '"><select name="cnorek[]" id="crek' + bykrow + '" class="form-control select2"><option value="null">Pilih</option></select></div>\
                        <div class="col-sm-2"><input type="text" name="nominal_cr[]" autocomplete="off" class="form-control currency nom_cr" placeholder="0.00"></div>\
                        <div class="button-group"><button type="button" class="btn btn-sm btn-success btn-tambah"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-times"></i></button></div>\
                    </div>';
            $("#dynamic_form_cr").append(form_trx);

            $('.select2').select2({
                width: '100%'
            });

            $(".currency").inputmask({
                alias: "numeric",
                groupSeparator: ".",
                removeMaskOnSubmit: true
            });

            $('#crtype1').change(function() {
                let rek = $("#crtype1").val();
                setRek(switch_rek(rek.substring(2)), 'crek1', user_loc);
            });

            $('#crek1').change(function() {
                var data = $('#crek1').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm1').val(pisah[1]);
            });

            $('#crtype2').change(function() {
                let rek = $("#crtype2").val();
                setRek(switch_rek(rek.substring(2)), 'crek2', user_loc);
            });

            $('#crek2').change(function() {
                var data = $('#crek2').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm2').val(pisah[1]);
            });

            $('#crtype3').change(function() {
                let rek = $("#crtype3").val();
                setRek(switch_rek(rek.substring(2)), 'crek3', user_loc);
            });

            $('#crek3').change(function() {
                var data = $('#crek3').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm3').val(pisah[1]);
            });

            $('#crtype4').change(function() {
                let rek = $("#crtype4").val();
                setRek(switch_rek(rek.substring(2)), 'crek4', user_loc);
            });

            $('#crek4').change(function() {
                var data = $('#crek4').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm4').val(pisah[1]);
            });

            $('#crtype5').change(function() {
                let rek = $("#crtype5").val();
                setRek(switch_rek(rek.substring(2)), 'crek5', user_loc);
            });

            $('#crek5').change(function() {
                var data = $('#crek5').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm5').val(pisah[1]);
            });

            $('#crtype6').change(function() {
                let rek = $("#crtype6").val();
                setRek(switch_rek(rek.substring(2)), 'crek6', user_loc);
            });

            $('#crek6').change(function() {
                var data = $('#crek6').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm6').val(pisah[1]);
            });

            $('#crtype7').change(function() {
                let rek = $("#crtype7").val();
                setRek(switch_rek(rek.substring(2)), 'crek7', user_loc);
            });

            $('#crek7').change(function() {
                var data = $('#crek7').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm7').val(pisah[1]);
            });

            $('#crtype8').change(function() {
                let rek = $("#crtype8").val();
                setRek(switch_rek(rek.substring(2)), 'crek8', user_loc);
            });

            $('#crek8').change(function() {
                var data = $('#crek8').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm8').val(pisah[1]);
            });

            $('#crtype9').change(function() {
                let rek = $("#crtype9").val();
                setRek(switch_rek(rek.substring(2)), 'crek9', user_loc);
            });

            $('#crek9').change(function() {
                var data = $('#crek9').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm9').val(pisah[1]);
            });

            $('#crtype10').change(function() {
                let rek = $("#crtype10").val();
                setRek(switch_rek(rek.substring(2)), 'crek10', user_loc);
            });

            $('#crek10').change(function() {
                var data = $('#crek10').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm10').val(pisah[1]);
            });

            $('#crtype11').change(function() {
                let rek = $("#crtype11").val();
                setRek(switch_rek(rek.substring(2)), 'crek11', user_loc);
            });

            $('#crek11').change(function() {
                var data = $('#crek11').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm11').val(pisah[1]);
            });

            $('#crtype12').change(function() {
                let rek = $("#crtype12").val();
                setRek(switch_rek(rek.substring(2)), 'crek12', user_loc);
            });

            $('#crek12').change(function() {
                var data = $('#crek12').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm12').val(pisah[1]);
            });

            $('#crtype13').change(function() {
                let rek = $("#crtype13").val();
                setRek(switch_rek(rek.substring(2)), 'crek13', user_loc);
            });

            $('#crek13').change(function() {
                var data = $('#crek13').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm13').val(pisah[1]);
            });

            $('#crtype14').change(function() {
                let rek = $("#crtype14").val();
                setRek(switch_rek(rek.substring(2)), 'crek14', user_loc);
            });

            $('#crek14').change(function() {
                var data = $('#crek14').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm14').val(pisah[1]);
            });

            $('#crtype15').change(function() {
                let rek = $("#crtype15").val();
                setRek(switch_rek(rek.substring(2)), 'crek15', user_loc);
            });

            $('#crek15').change(function() {
                var data = $('#crek15').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm15').val(pisah[1]);
            });

            $('#crtype16').change(function() {
                let rek = $("#crtype16").val();
                setRek(switch_rek(rek.substring(2)), 'crek16', user_loc);
            });

            $('#crek16').change(function() {
                var data = $('#crek16').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm16').val(pisah[1]);
            });

            $('#crtype17').change(function() {
                let rek = $("#crtype17").val();
                setRek(switch_rek(rek.substring(2)), 'crek17', user_loc);
            });

            $('#crek17').change(function() {
                var data = $('#crek17').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm17').val(pisah[1]);
            });

            $('#crtype18').change(function() {
                let rek = $("#crtype18").val();
                setRek(switch_rek(rek.substring(2)), 'crek18', user_loc);
            });

            $('#crek18').change(function() {
                var data = $('#crek18').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm18').val(pisah[1]);
            });

            $('#crtype19').change(function() {
                let rek = $("#crtype19").val();
                setRek(switch_rek(rek.substring(2)), 'crek19', user_loc);
            });

            $('#crek19').change(function() {
                var data = $('#crek19').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm19').val(pisah[1]);
            });

            $('#crtype20').change(function() {
                let rek = $("#crtype20").val();
                setRek(switch_rek(rek.substring(2)), 'crek20', user_loc);
            });

            $('#crek20').change(function() {
                var data = $('#crek20').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#cnm20').val(pisah[1]);
            });

            $('.nom_cr').blur(function() {
                var total_dr = sumArray('nominal_dr[]');
                var total_cr = sumArray('nominal_cr[]');
                var balanced = parseFloat(total_dr - total_cr);
                $('#balanced').val(balanced);
            })

        }

        function addDr(bykrow) {
            var form_trx = '<div class="form-group row baru-data">\
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Rek | DR | Nominal</label>\
                        <div class="col-sm-2"><select name="drtype[]" id="drtype' + bykrow + '" class="form-control select2">\
                            <option value="null">Pilih</option><option value="drsbb">SBB</option><option value="drtab">Tabungan</option><option value="drdep">Deposito</option><option value="drpby">Pembiayaan</option>\
                        </select></div>\
                        <div class="col-sm-4"><input type="hidden" name="dnama[]" id="dnm' + bykrow + '"><select name="dnorek[]" id="drek' + bykrow + '" class="form-control select2"><option value="null">Pilih</option></select></div>\
                        <div class="col-sm-2"><input type="text" name="nominal_dr[]" autocomplete="off" class="form-control currency" placeholder="0.00"></div>\
                        <div class="button-group"><button type="button" class="btn btn-sm btn-success btn-tambah"><i class="fa fa-plus"></i></button><button type="button" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-times"></i></button></div>\
                    </div>';
            $("#dynamic_form_dr").append(form_trx);

            $('.select2').select2({
                width: '100%'
            });

            $(".currency").inputmask({
                alias: "numeric",
                groupSeparator: ".",
                removeMaskOnSubmit: true
            });

            $('#drtype1').change(function() {
                let rek = $("#drtype1").val();
                setRek(switch_rek(rek.substring(2)), 'drek1', user_loc);
            });

            $('#drek1').change(function() {
                var data = $('#drek1').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm1').val(pisah[1]);
            });

            $('#drtype2').change(function() {
                let rek = $("#drtype2").val();
                setRek(switch_rek(rek.substring(2)), 'drek2', user_loc);
            });

            $('#drek2').change(function() {
                var data = $('#drek2').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm2').val(pisah[1]);
            });

            $('#drtype3').change(function() {
                let rek = $("#drtype3").val();
                setRek(switch_rek(rek.substring(2)), 'drek3', user_loc);
            });

            $('#drek3').change(function() {
                var data = $('#drek3').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm3').val(pisah[1]);
            });

            $('#drtype4').change(function() {
                let rek = $("#drtype4").val();
                setRek(switch_rek(rek.substring(2)), 'drek4', user_loc);
            });

            $('#drek4').change(function() {
                var data = $('#drek4').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm4').val(pisah[1]);
            });

            $('#drtype5').change(function() {
                let rek = $("#drtype5").val();
                setRek(switch_rek(rek.substring(2)), 'drek5', user_loc);
            });

            $('#drek5').change(function() {
                var data = $('#drek5').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm5').val(pisah[1]);
            });

            $('#drtype6').change(function() {
                let rek = $("#drtype6").val();
                setRek(switch_rek(rek.substring(2)), 'drek6', user_loc);
            });

            $('#drek6').change(function() {
                var data = $('#drek6').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm6').val(pisah[1]);
            });

            $('#drtype7').change(function() {
                let rek = $("#drtype7").val();
                setRek(switch_rek(rek.substring(2)), 'drek7', user_loc);
            });

            $('#drek7').change(function() {
                var data = $('#drek7').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm7').val(pisah[1]);
            });

            $('#drtype8').change(function() {
                let rek = $("#drtype8").val();
                setRek(switch_rek(rek.substring(2)), 'drek8', user_loc);
            });

            $('#drek8').change(function() {
                var data = $('#drek8').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm8').val(pisah[1]);
            });

            $('#drtype9').change(function() {
                let rek = $("#drtype9").val();
                setRek(switch_rek(rek.substring(2)), 'drek9', user_loc);
            });

            $('#drek9').change(function() {
                var data = $('#drek9').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm9').val(pisah[1]);
            });

            $('#drtype10').change(function() {
                let rek = $("#drtype10").val();
                setRek(switch_rek(rek.substring(2)), 'drek10', user_loc);
            });

            $('#drek10').change(function() {
                var data = $('#drek10').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm10').val(pisah[1]);
            });

            $('#drtype11').change(function() {
                let rek = $("#drtype11").val();
                setRek(switch_rek(rek.substring(2)), 'drek11', user_loc);
            });

            $('#drek11').change(function() {
                var data = $('#drek11').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm11').val(pisah[1]);
            });

            $('#drtype12').change(function() {
                let rek = $("#drtype12").val();
                setRek(switch_rek(rek.substring(2)), 'drek12', user_loc);
            });

            $('#drek12').change(function() {
                var data = $('#drek12').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm12').val(pisah[1]);
            });

            $('#drtype13').change(function() {
                let rek = $("#drtype13").val();
                setRek(switch_rek(rek.substring(2)), 'drek13', user_loc);
            });

            $('#drek13').change(function() {
                var data = $('#drek13').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm13').val(pisah[1]);
            });

            $('#drtype14').change(function() {
                let rek = $("#drtype14").val();
                setRek(switch_rek(rek.substring(2)), 'drek14', user_loc);
            });

            $('#drek14').change(function() {
                var data = $('#drek14').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm14').val(pisah[1]);
            });

            $('#drtype15').change(function() {
                let rek = $("#drtype15").val();
                setRek(switch_rek(rek.substring(2)), 'drek15', user_loc);
            });

            $('#drek15').change(function() {
                var data = $('#drek15').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm15').val(pisah[1]);
            });

            $('#drtype16').change(function() {
                let rek = $("#drtype16").val();
                setRek(switch_rek(rek.substring(2)), 'drek16', user_loc);
            });

            $('#drek16').change(function() {
                var data = $('#drek16').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm16').val(pisah[1]);
            });

            $('#drtype17').change(function() {
                let rek = $("#drtype17").val();
                setRek(switch_rek(rek.substring(2)), 'drek17', user_loc);
            });

            $('#drek17').change(function() {
                var data = $('#drek17').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm17').val(pisah[1]);
            });

            $('#drtype18').change(function() {
                let rek = $("#drtype18").val();
                setRek(switch_rek(rek.substring(2)), 'drek18', user_loc);
            });

            $('#drek18').change(function() {
                var data = $('#drek18').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm18').val(pisah[1]);
            });

            $('#drtype19').change(function() {
                let rek = $("#drtype19").val();
                setRek(switch_rek(rek.substring(2)), 'drek19', user_loc);
            });

            $('#drek19').change(function() {
                var data = $('#drek19').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm19').val(pisah[1]);
            });

            $('#drtype20').change(function() {
                let rek = $("#drtype20").val();
                setRek(switch_rek(rek.substring(2)), 'drek20', user_loc);
            });

            $('#drek20').change(function() {
                var data = $('#drek20').select2('data');
                var txt = data[0].text;
                var pisah = txt.split("~");
                $('#dnm20').val(pisah[1]);
            });
        }

        $("#dynamic_form_cr").on("click", ".btn-tambah", function() {
            addCr(countCr++);
            $(this).css("display", "none");
            var valtes = $(this).parent().find(".btn-hapus").css("display", "");
        });

        $("#dynamic_form_cr").on("click", ".btn-hapus", function() {
            $(this).parent().parent('.baru-data').remove();
            countCr--;
            var bykrow = $("#dynamic_form_cr .baru-data").length;
            if (bykrow == 1) {
                $(".btn-hapus").css("display", "none");
                $(".btn-tambah").css("display", "");
            } else {
                $('#dynamic_form_cr .baru-data').last().find('.btn-tambah').css("display", "");
            }
        });

        $("#dynamic_form_dr").on("click", ".btn-tambah", function() {
            addDr(countDr++);
            $(this).css("display", "none");
            var valtes = $(this).parent().find(".btn-hapus").css("display", "");
        });

        $("#dynamic_form_dr").on("click", ".btn-hapus", function() {
            $(this).parent().parent('.baru-data').remove();
            countDr--;
            var bykrow = $("#dynamic_form_dr .baru-data").length;
            if (bykrow == 1) {
                $(".btn-hapus").css("display", "none");
                $(".btn-tambah").css("display", "");
            } else {
                $('#dynamic_form_dr .baru-data').last().find('.btn-tambah').css("display", "");
            }
        });

        $('#btn-print').click(function() {
            $.ajax({
                type: 'POST',
                url: '<?= current_url() ?>',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: $('#form_create_trx').serialize(),
                dataType: "JSON",
                cache: false,
                success: function(data) {
                    if (data.status) {
                        Swal.fire({
                            title: data.title,
                            html: data.desc,
                            icon: data.icon,
                            confirmButtonText: "Print!",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#form_create_trx")[0].reset();
                                window.open(base_url + "print/" + data.data, '_cetak');
                                location.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            title: data.title,
                            html: data.desc,
                            icon: data.icon,
                        })
                    }

                },
                error: function(e) {
                    console.log(e);
                }
            })
        })
    });
</script>
<?= $this->endSection() ?>