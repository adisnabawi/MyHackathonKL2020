# My Hackathon KL 2020
## A solution for the PRIHATIN THEMES No. 4 - QR Identity


Our solution is based on the QR Code where the information is encrypted and users just need to scan the QR code. It will populate the input form automatically.
Thus it solve the disrepancies and the need for the users to entered manually.

The dencrypted data as follow:
```
{
   "nama":"adis nabawi",
   "ic":910112111234,
   "alamat":"Kampung Siput, Dimana mana, 06000 Jitra, Kedah",
   "status":"warganegara",
   "agama":"islam",
   "jantina":"lelaki"
}
```

Encryption that we use are
```
AES-256-CBC
MD5
```

#### Live demo
To check the live demo you can go to this link: <a href="https://hackathonkl20.adisazizan.xyz/">Live Demo</a>

<img src="https://hackathonkl20.adisazizan.xyz/result.gif">


#### To try out
```
1. Download the demo folder
2. composer install
3. cp .env.sample .env
4. php artisan key:generate
5. php artisan migrate

```

#### Presentation slide
For the presentation slide please click here <a href="https://liveiiumedu-my.sharepoint.com/:p:/g/personal/adis_live_iium_edu_my/Eb-kpY685mlHlWutQWBiFloB58NjCv6RzITIsjrIbfgdWQ?e=ACLf8F" target="_blank"> Presentation Slide </a>
