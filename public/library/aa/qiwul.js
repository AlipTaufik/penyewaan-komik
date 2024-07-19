// Fungsi untuk mengubah string tanggal menjadi timestamp menggunakan parseInt
function convertDateToInteger(dateString) {
    const date = new Date(dateString);
    return date.getTime(); // Mendapatkan timestamp dalam milidetik
}

// Fungsi untuk menghitung selisih antara dua tanggal dalam jumlah hari
function calculateDateDifference(dateString1, dateString2) {
    const timestamp1 = convertDateToInteger(dateString1);
    const timestamp2 = convertDateToInteger(dateString2);

    // Hitung selisih timestamp dalam milidetik
    const differenceInMilliseconds = Math.abs(timestamp1 - timestamp2);

    // Konversi milidetik menjadi hari (1 hari = 24 jam * 60 menit * 60 detik * 1000 milidetik)
    const differenceInDays = differenceInMilliseconds / (1000 * 60 * 60 * 24);

    return Math.ceil(differenceInDays); // Menggunakan Math.ceil untuk mengabaikan sisa hari dan memastikan hasil dalam bentuk integer
}

function hitungSubtotal() {
    // Mendapatkan nilai harga
    let harga = parseFloat(document.getElementById('harga').value);

    // Mendapatkan nilai tanggal sewa dan tanggal dikembalikan
    let tanggalSewa = document.getElementById('tanggal_sewa').value;
    let tanggalDikembalikan = document.getElementById('tanggal_dikembalikan').value;

    // Menghitung selisih hari antara tanggal sewa dan tanggal dikembalikan
    let qty = calculateDateDifference(tanggalSewa, tanggalDikembalikan);

    // Menampilkan qty di input field qty
    document.getElementById('qty').value = qty;

    // Menghitung subtotal
    let subtotal = harga * qty;

    // Menampilkan subtotal di input field subtotal
    document.getElementById('subtotal').value = subtotal.toFixed(2); // Menggunakan toFixed untuk format 2 angka desimal
    console.log('Subtotal calculated:', subtotal);
}


$(document).ready(function() {
    $('#search').on('input', function() {
        var query = $(this).val();
        console.log('Search query:', query);
        if (query.length > 0) {
            $.ajax({
                url: 'http://127.0.0.1:8000/search-komik',
                method: 'GET',
                data: { query: query },
                success: function(data) {
                    console.log('Data received:', data);
                    var saran = ''; // Memperbaiki spasi ekstra dan deklarasi variabel

                    data.forEach(function(brg) {
                        saran += '<div class="autocomplete-suggestion" ' +
                                 'data-kode_komik="' + brg.kode_komik + '" ' +
                                 'data-harga="' + brg.harga + '" ' +
                                 'data-nama_komik="' + brg.nama_komik + '">' +
                                 brg.kode_komik + ' - ' + brg.nama_komik + ' - ' + brg.harga +
                                 '</div>'; // Menambahkan concatenation yang hilang + '</div>'
                    });
                    $('#suggestions').html(saran);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error: ', status, error);
                }
            });
        } else {
            $('#suggestions').html('');
        }
    });

    $(document).on('click', '.autocomplete-suggestion', function() {
        var kode_komik = $(this).data('kode_komik');
        var nama_komik = $(this).data('nama_komik');
        var harga = $(this).data('harga');

        // Sekarang nim dan nama mengandung nilai yang sesuai
        console.log('Kode komik: ' + kode_komik);
        console.log('Nama komik: ' + nama_komik);
        console.log('Harga komik: ' + harga);

        // Jika Anda ingin menempatkan teks gabungan di input field
        $('#kode_komik').val(kode_komik);
        $('#nama_komik').val(nama_komik);
        $('#harga').val(harga);

        // Hitung ulang subtotal jika qty sudah dimasukkan
        hitungSubtotal();

        // Kosongkan field pencarian dan saran
        $('#search').val('');
        $('#suggestions').html('');
    });
});
