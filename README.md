#GRAFİK TASARIM
Projem bir freelance grafik tasarım web sitesi. Sitemde ana sayfa, hakkımızda, iletişim ve hizmetlerimiz kısımları bulunuyor. Ana sayfa ve hakkımızda kısımları hakkında anlatılacak pek bişey yok.
İletişim kısmında bir iletişim formu var bu formda kullanıcı bilgilerini dolduruyor. ve konu kısmında services tablosundan çekilen hizmetlerden birini seçip bir iletişim mesajı yolluyor ve bu mesaj veritabanına kaydediliyor.
Hizmetlerimiz kısmında logo tasarım, web tasarım, katalog tasarım, ürün tasarım, afiş tasarım, kartvizit tasarım, etiket tasarım, dükkan tasarım sekmeleri bulunuyor. Bu sekmelere ait bilgiler farklı veritabanı tablolarında 
tutuluyor. Bu tabloların tasarım alanına özel farklı özellikleri bulunduğu için ayrı tablolarda tutuluyor. Bu 8 tablonun hepside designers tablosuna bağlanıyor. Projemdeki diğer tabloları migration kullanarak oluştursamda bu tabloları Sql serverda kendi elimle oluşturup doldurdum.
Girdiğimiz her bir tasarım sekmesinde o alandaki tasarımcıların bilgileri ve resimleri geliyor. İş yapmak istediğimiz tasarımcıyla iletişime geç butonuna tıkladığımızda karşımıza sipariş sayfası geliyor. Bu sayfada
tasarımcının daha detaylı bilgileri bulunuyor ve sağ tarafta sipariş oluşturma formu bulunuyor. Burada oluşturduğumuz siparişler orders tablosuna kaydediliyor. Sayfanın sağ üstünde giriş yapma kısmı bulunuyor daha önce 
kayıt olunmamışsa öncelikle kullanıcı buradan kayıt oluşturuyor. Bu kayıtlar veritabanında tutulup daha sonra giriş yapılabiliyor. Ayrıca sitenin bazı işlemler için  kullanıcıdan önce giriş yapmasını istediği bir sistem var. 
Örneğin hizmetlerimiz kısmına da bir iş yaptırmak isteniyorsa önce giriş yapılması gerekiyor. Onun dışında kullanıcıların tasarımcılara mesaj gönderebildiği bir sistem var. Giriş yaptıktan sonra profil kısmına tıklayıp bu mesajlaşma
kısmına erişilebiliyor. Aynı şekilde profil kısmına tıklayıp çıkış yapılabiliyor.
