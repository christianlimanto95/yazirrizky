# template

ini adalah template codeigniter

### Dalam folder `core`, terdapat `General_controller`
Setiap controller selalu `extends General_controller`.

Dalam General_controller terdapat function2 umum yg dapat dipakai di controller yg membutuhkan, yaitu : 
- `view()`
- `isLogggedIn()`
- `loadAdditionalCss()`
- `loadAdditionalJs()`
- dll.

Contoh :
```
Class Home_controller extends General_controller {
	public __construct() {
		parent::__construct();
	}
}
```


### Untuk setiap page, file yg harus ada :
- Controller
- Model
- View
- CSS
- JS

##### Contoh page `Home` :
- Controller : Home_controller.php (huruf besar di depan)
- Model : Home_model.php (huruf besar di depan)
- View : home.php
- CSS : home.css
- JS : home.js


### Letak CSS dan JS :
CSS terletak di folder `assets/css/nama_file.css`
JS terletak di folder `assets/js/nama_file.js`
