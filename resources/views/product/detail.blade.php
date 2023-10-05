<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ini adalah product dengan id {{$id}}</h1>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/te_evaluasi.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <title>Document</title>
</head>

<body>
    
<script>
        // Ambil elemen tombol "Hitung"
        var hitungButton = document.getElementById("hitung-button");
        var totalKeseluruhanElement = document.getElementById("total-keseluruhan");
        var totalKeseluruhan2Element = document.getElementById("total-keseluruhan2");

        // Tambahkan event listener untuk menghandle klik pada tombol
        hitungButton.addEventListener("click", function() {
            // Inisialisasi total untuk setiap pertanyaan
            var totalPertanyaan1 = 0;
            var totalPertanyaan2 = 0;
            var totalPertanyaan3 = 0;
            var totalPertanyaan4 = 0;
            var totalPertanyaan5 = 0;
            var totalPertanyaan6 = 0;
            var totalPertanyaan7 = 0;
            var totalPertanyaan8 = 0;
            var totalPertanyaan9 = 0;
            var totalPertanyaan10 = 0;

            var totalPertanyaan2_1 = 0;
            var totalPertanyaan2_2 = 0;
            var totalPertanyaan2_3 = 0;
            var totalPertanyaan2_4 = 0;
            var totalPertanyaan2_5 = 0;
            // Dan seterusnya untuk setiap pertanyaan

            // Ambil semua radio button yang memiliki nama yang sesuai dengan pertanyaan
            var radioPertanyaan1 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_1"]:checked');
            var radioPertanyaan2 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_2"]:checked');
            var radioPertanyaan3 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_3"]:checked');
            var radioPertanyaan4 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_4"]:checked');
            var radioPertanyaan5 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_5"]:checked');
            var radioPertanyaan6 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_6"]:checked');
            var radioPertanyaan7 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_7"]:checked');
            var radioPertanyaan8 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_8"]:checked');
            var radioPertanyaan9 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_9"]:checked');
            var radioPertanyaan10 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_10"]:checked');

            var radioPertanyaan2_1 = document.querySelectorAll('input[name="tingkat_keahlian2_pertanyaan_1"]:checked');
            var radioPertanyaan2_2 = document.querySelectorAll('input[name="tingkat_keahlian2_pertanyaan_2"]:checked');
            var radioPertanyaan2_3 = document.querySelectorAll('input[name="tingkat_keahlian2_pertanyaan_3"]:checked');
            var radioPertanyaan2_4 = document.querySelectorAll('input[name="tingkat_keahlian2_pertanyaan_4"]:checked');
            var radioPertanyaan2_5 = document.querySelectorAll('input[name="tingkat_keahlian2_pertanyaan_5"]:checked');
            // Dan seterusnya untuk setiap pertanyaan

            // Hitung total nilai untuk setiap pertanyaan
            for (var i = 0; i < radioPertanyaan1.length; i++) {
                totalPertanyaan1 += parseInt(radioPertanyaan1[i].value);
            }
            for (var i = 0; i < radioPertanyaan2.length; i++) {
                totalPertanyaan2 += parseInt(radioPertanyaan2[i].value);
            }
            for (var i = 0; i < radioPertanyaan3.length; i++) {
                totalPertanyaan3 += parseInt(radioPertanyaan3[i].value);
            }
            for (var i = 0; i < radioPertanyaan4.length; i++) {
                totalPertanyaan4 += parseInt(radioPertanyaan4[i].value);
            }
            for (var i = 0; i < radioPertanyaan5.length; i++) {
                totalPertanyaan5 += parseInt(radioPertanyaan5[i].value);
            }
            for (var i = 0; i < radioPertanyaan6.length; i++) {
                totalPertanyaan6 += parseInt(radioPertanyaan6[i].value);
            }
            for (var i = 0; i < radioPertanyaan7.length; i++) {
                totalPertanyaan7 += parseInt(radioPertanyaan7[i].value);
            }
            for (var i = 0; i < radioPertanyaan8.length; i++) {
                totalPertanyaan8 += parseInt(radioPertanyaan8[i].value);
            }
            for (var i = 0; i < radioPertanyaan9.length; i++) {
                totalPertanyaan9 += parseInt(radioPertanyaan9[i].value);
            }
            for (var i = 0; i < radioPertanyaan10.length; i++) {
                totalPertanyaan10 += parseInt(radioPertanyaan10[i].value);
            }

            for (var i = 0; i < radioPertanyaan2_1.length; i++) {
                totalPertanyaan2_1 += parseInt(radioPertanyaan2_1[i].value);
            }
            for (var i = 0; i < radioPertanyaan2_2.length; i++) {
                totalPertanyaan2_2 += parseInt(radioPertanyaan2_2[i].value);
            }
            for (var i = 0; i < radioPertanyaan2_3.length; i++) {
                totalPertanyaan2_3 += parseInt(radioPertanyaan3[i].value);
            }
            for (var i = 0; i < radioPertanyaan2_4.length; i++) {
                totalPertanyaan2_4 += parseInt(radioPertanyaan2_4[i].value);
            }
            for (var i = 0; i < radioPertanyaan2_5.length; i++) {
                totalPertanyaan2_5 += parseInt(radioPertanyaan2_5[i].value);
            }
            // Dan seterusnya untuk setiap pertanyaan

            // Hitung total keseluruhan
            var totalKeseluruhan = totalPertanyaan1 + totalPertanyaan2 + totalPertanyaan3 + totalPertanyaan4 + totalPertanyaan5 
            + totalPertanyaan6 + totalPertanyaan7 + totalPertanyaan8 + totalPertanyaan9 + totalPertanyaan10;

            var totalKeseluruhan2 = totalPertanyaan2_1 + totalPertanyaan2_2 + totalPertanyaan2_3 + totalPertanyaan2_4 + totalPertanyaan2_5 

            // Tampilkan total keseluruhan dalam elemen HTML
            totalKeseluruhanElement.textContent = totalKeseluruhan.toString();
            totalKeseluruhan2Element.textContent = totalKeseluruhan2.toString();
            
            
        });

    </script>
    
    
</body>
</html>