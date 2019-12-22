# Hotel Webservice Endpoint

## Kamar

### GET

#### /api/kamar

    Get Tipe Kamar

#### /api/kamar?id_kamar=int&tipe=string

    Get Kamar by tipe and id_kamar

#### /api/kamar?tipe=string

    Get Kamar by tipe

#### /api/kamar/filter?awal=int&akhir=int

    Get Kamar with price filter

#### /api/kamar/kamar/

    Get All Kamar Datas

#### /api/kamar/lokasi

    Get kamar with group location

#### /api/kamar/lokasi?lokasi=string

    Get Kamar with location filter

### POST

#### /api/kamar

    Input kamar
    body : {
    	no_kamar: int
    	tipe: string
    	harga: int
    	jml_ranjang: int
    deskripsi: string
    lokasi: string
    	status: int
    	gambar: text
    }

### PUT

#### /api/kamar

    Edit kamar
    body : {
    	no_kamar: int
    	tipe: string
    	harga: int
    	jml_ranjang: int
    deskripsi: string
    lokasi: string
    	status: int
    	gambar: text
    }

### DELETE

#### /api/kamar

    Delete Kamar
    body : {
    	id_kamar: int
    }

## User

### GET

#### /api/user

    Get User

#### /api/user?id_user=int

    Get User by id

### POST

#### /api/user

    Input user
    body : {
    	nama: string
    	email: string
    	no_telp: string
    	username: string
    	password: string
    	role: string
    }

### PUT

#### /api/user

    Edit user
    body : {
    	id_user: int
    	nama: string
    	email: string
    	no_telp: string
    	username: string
    	password: string
    	role: string
    }

### DELETE

#### /api/user

    Delete User
    body : {
    	id_user: int
    }

## Transaksi

### GET

#### /api/transaksi

    Get All Transaksi

#### /api/transaksi?id_transaksi=int

    Get Transaksi by Id Transaksi

#### /api/transaksi/user?id_user=int

    Get Transaksi by Id User

### POST

#### /api/transaksi

    Input transaksi
    body : {
    	id_kamar: int
    	id_user: int
    	checkin: string / date
    	checkout: string / date
    	total: int
    }

### PUT

#### /api/transaksi

    Edit transaksi
    body : {
    	id_transaksi: int
    	id_kamar: int
    	id_user: int
    	checkin: string / date
    	checkout: string / date
    	total: int
    }

### DELETE

#### /api/transaksi

    Delete transaksi
    body : {
    	id_transaksi: int
    }

## Login

### POST

#### /api/user/login

    Login all role
    body : {
    	username: string,
    	password: string
    }
