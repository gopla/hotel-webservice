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

### POST

#### /api/kamar

    Input kamar
    body : {
    	no_kamar: int
    	tipe: string
    	harga: int
    	jml_ranjang: int
    	status: int
    	gambar: text
    }

### PUT

#### /api/kamar

    Edit kamar
    body : {
    	id_kamar: int
    	no_kamar: int
    	tipe: string
    	harga: int
    	jml_ranjang: int
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
