28/09/2014
Task Lama yang saya kebingungan
1) echo session username/name
   gunakan: <?php echo $this->session->userdata('sess_usr_name'); ?>
   variable session tersebut sudah dibuat di user_controller/proses_user_login()

2) delete tempdataresult (yang buat guest)
   proses penghapusan ini dilakukan pada saat user menekan menu exam
   perintah penghapusannya di model tmpresult_model function clearTable()

Task List Yang menurut sata belum pak Somi...

1) Save Data Exam Result (untuk user sama konsepnya cuma buat satu tabel lagi persis seperti tbltmpresult)
   Proses ini saya rubah dengan update exam result, karena proses pengisian data exam yang sudah dirandom
   sudah dilakukan pada saat pemilihan jumlah soal lihat function save_exam_tmp_limit
   
   untuk menampilkan soal dan pagination lihat function all_exam_tmp().

2) Show Data Exam Result buat User
   konsepnya sama seperti function finalresult(), cuma datanya diambil dari tabel yang dibuat baru seperti tbltmpresult)
3) Pagination pada soal
4) All Exam biar random pada awalnya saja, tapi pada pagination tidak random
   Logikanya:
   1. pada saat memilih menu exam kosongkan isi tbltmpresult.
   2. pada saat menentukan jumlah soal, setelah soal yang sudah dirandom ditemukan dari tabel question, hasilnya
      langsung disimpan ke tabel tbltmpresult.
   3. Soal yang ditampilkan diambil dari tabel tbltmpresult.
