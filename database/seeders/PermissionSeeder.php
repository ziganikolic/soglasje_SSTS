<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vsa soglasja
        //soglasja kategorija - 1,2,3 (privolitve so enake le kategorija je druga)
        $privolitev1 = 'na šolskih spletnih straneh';
        $privolitev2 = 'na družbenih omrežjih šole';
        $privolitev3 = 'v javnih medijih';
        $privolitev4 = 'v šolskih publikacijah';
        $privolitev5 = 'na šolskih javnih mestih (oglasne deske, zasloni, šolski radio)';
        $privolitev6 = 'na promocijskih dogodkih šole';

        $privolitev_posebna_1 = 'da moj otrok lahko sodeluje pri izvajanju različnih anket, ki ne zahtevajo podpisovanja oziroma navaja osebnega imena';
        $privolitev_posebna_2 = 'da moj otrok lahko sodeluje pri snemanju različnih izobraževalnih, promocijskih oddaj, ki jih občasno na šoli izvajajo medijske hiše';
        $privolitev_posebna_3 = 'da se podatki o imenu, priimku, oddelku, šoli, starosti in naslovu mojega otroka posredujejo organizatorju za namen izvedbe dogodka (npr. projekta, delavnice, srečanja, izmenjave dijakov, tekmovanja, ekskurzije, natečaja)';
        $privolitev_posebna_4 = 'da šola osebne podatke mojega otroka (ime in priimek, EMŠO, naslov) uporabi za ureditev prijave za dostop do brezžičnega izobraževalnega omrežja EDUROAM in spletne učilnice ter mu dodeli šolski e-naslov (AAI prijava)';


        $privolitev_sportno_vzgojni_karton = 'da šola pridobi za namen vodenja evidence podatkov o gibalnih in morfoloških značilnostih dijakov, ugotavljanja takšnih značilnosti in sposobnosti:
        podatke o mojih gibalnih sposobnostih in morfoloških značilnostih, ki se nanašajo na telesno višino, voluminoznost telesa, hitrost alternativnih gibov, eksplozivno moč, koordinacijo gibanja telesa, fizično vzdržljivost trupa, gibljivost, mišično vzdržljivost ramenskega obroča in rok, sprintersko hitrost in vzdržljivost v submaksimalnem kontinuiranem naprezanju za namen vodenja evidence podatkov o gibalnih sposobnostih in morfoloških značilnosti vpisanih dijakov, ki jo vodi šola skladno z določili 5. točke 86. člena ZPSI-1, 5. točke ZGim in 14. člena Pravilnika o šolski dokumentaciji v srednješolskem izobraževanju.';

        $privolitev_svetovalna_sluzba1='da šola (svetovalna služba v šoli) pridobiva in dalje obdeluje podatke o mojem otroku za namen izvrševanja delovnih nalog na področju razvojnih in preventivnih dejavnosti, dejavnosti načrtovanja in evalvacije in dejavnosti pomoči, kot so npr. karierna orientacija, učenje učenja… (Programske smernice: Svetovalna služba v SŠ, posebne oz. občutljive podatke pa na podlagi ZPSI-1 oz. ZGim in Pravilnika o šolski dokumentaciji v srednješolskem izobraževanju):
        podatke o družinski in socialni anamnezi,
        podatke o razvojni anamnezi,
        podatke o diagnostičnih postopkih,
        podatke o postopkih strokovne pomoči,
        strokovna mnenja drugih institucij: centrov za socialno delo, zdravstvenih institucij, domov, svetovalnih centrov oziroma vzgojnih posvetovalnic, z namenom svetovanja in pomoči:
        pri razreševanju osebnih stisk, učnih težav ter vedenjskih težav,
        pri svetovalnem delu z dijaki s posebnimi potrebami,
        pri pridobivanju, koordiniranju in izvajanju dodatne strokovne pomoči,
        pri poklicni orientaciji (informiranje, svetovanje, prijave na visokošolske zavode) ter
        pri reševanju socialno-ekonomskih stisk dijakov.
        Evidenca se vodi v skladu z določili 14. člena Pravilnika o šolski dokumentaciji v srednješolskem izobraževanju.';

        $privolitev_svetovalna_sluzba2='da šola (svetovalna služba v šoli) pridobiva in dalje obdeluje podatke o meni za namen izvrševanja delovnih nalog na področju razvojnih in preventivnih dejavnosti, dejavnosti načrtovanja in evalvacije in dejavnosti pomoči, kot so npr. karierna orientacija, učenje učenja… (Programske smernice: Svetovalna služba v SŠ, posebne oz. občutljive podatke pa na podlagi ZPSI-1 oz. ZGim in Pravilnika o šolski dokumentaciji v srednješolskem izobraževanju):
        podatke o družinski in socialni anamnezi,
        podatke o razvojni anamnezi,
        podatke o diagnostičnih postopkih,
        podatke o postopkih strokovne pomoči,
        strokovna mnenja drugih institucij: centrov za socialno delo, zdravstvenih institucij, domov, svetovalnih centrov oziroma vzgojnih posvetovalnic, z namenom svetovanja in pomoči:
        pri razreševanju  osebnih stisk, učnih težav ter vedenjskih težav,
        pri svetovalnem delu z dijaki s posebnimi potrebami,
        pri pridobivanju, koordiniranju in izvajanju dodatne strokovne pomoči,
        pri poklicni orientaciji (informiranje, svetovanje, prijave na visokošolske zavode) ter
        pri reševanju socialno-ekonomskih stisk dijakov.
        Evidenca se vodi v skladu z določili 14. člena Pravilnika o šolski dokumentaciji v srednješolskem izobraževanju.';

        //array kategorije
        $privolitve = [
            //kategorija 1
            [
                'permission_name' => $privolitev1,
                'category_id' => '1'
            ],
            [
                'permission_name' => $privolitev2,
                'category_id' => '1'
            ],
            [
                'permission_name' => $privolitev3,
                'category_id' => '1'
            ],
            [
                'permission_name' => $privolitev4,
                'category_id' => '1'
            ],
            [
                'permission_name' => $privolitev5,
                'category_id' => '1'
            ],
            [
                'permission_name' => $privolitev6,
                'category_id' => '1'
            ],

            //kategorija 2
            [
                'permission_name' => $privolitev1,
                'category_id' => '2'
            ],
            [
                'permission_name' => $privolitev2,
                'category_id' => '2'
            ],
            [
                'permission_name' => $privolitev3,
                'category_id' => '2'
            ],
            [
                'permission_name' => $privolitev4,
                'category_id' => '2'
            ],
            [
                'permission_name' => $privolitev5,
                'category_id' => '2'
            ],
            [
                'permission_name' => $privolitev6,
                'category_id' => '2'
            ],


            //kategorija 3
            [
                'permission_name' => $privolitev1,
                'category_id' => '3'
            ],
            [
                'permission_name' => $privolitev2,
                'category_id' => '3'
            ],
            [
                'permission_name' => $privolitev3,
                'category_id' => '3'
            ],
            [
                'permission_name' => $privolitev4,
                'category_id' => '3'
            ],
            [
                'permission_name' => $privolitev5,
                'category_id' => '3'
            ],
            [
                'permission_name' => $privolitev6,
                'category_id' => '3'
            ],

            //kategorija 4
            [
                'permission_name' => $privolitev1,
                'category_id' => '4'
            ],
            [
                'permission_name' => $privolitev2,
                'category_id' => '4'
            ],
            [
                'permission_name' => $privolitev3,
                'category_id' => '4'
            ],
            [
                'permission_name' => $privolitev4,
                'category_id' => '4'
            ],
            [
                'permission_name' => $privolitev5,
                'category_id' => '4'
            ],
            [
                'permission_name' => $privolitev6,
                'category_id' => '4'
            ],

            //kategorija 5
            [
                'permission_name' => $privolitev1,
                'category_id' => '5'
            ],
            [
                'permission_name' => $privolitev2,
                'category_id' => '5'
            ],
            [
                'permission_name' => $privolitev3,
                'category_id' => '5'
            ],
            [
                'permission_name' => $privolitev4,
                'category_id' => '5'
            ],
            [
                'permission_name' => $privolitev5,
                'category_id' => '5'
            ],
            [
                'permission_name' => $privolitev6,
                'category_id' => '5'
            ],

            //kategorija 6
            [
                'permission_name' => $privolitev1,
                'category_id' => '6'
            ],
            [
                'permission_name' => $privolitev2,
                'category_id' => '6'
            ],
            [
                'permission_name' => $privolitev3,
                'category_id' => '6'
            ],
            [
                'permission_name' => $privolitev4,
                'category_id' => '6'
            ],
            [
                'permission_name' => $privolitev5,
                'category_id' => '6'
            ],
            [
                'permission_name' => $privolitev6,
                'category_id' => '6'
            ],

            //kategorija 7
            [
                'permission_name' => $privolitev1,
                'category_id' => '7'
            ],
            [
                'permission_name' => $privolitev2,
                'category_id' => '7'
            ],
            [
                'permission_name' => $privolitev3,
                'category_id' => '7'
            ],
            [
                'permission_name' => $privolitev4,
                'category_id' => '7'
            ],
            [
                'permission_name' => $privolitev5,
                'category_id' => '7'
            ],
            [
                'permission_name' => $privolitev6,
                'category_id' => '7'
            ],

            //kategorija 8
            [
                'permission_name' => $privolitev1,
                'category_id' => '8'
            ],
            [
                'permission_name' => $privolitev2,
                'category_id' => '8'
            ],
            [
                'permission_name' => $privolitev3,
                'category_id' => '8'
            ],
            [
                'permission_name' => $privolitev4,
                'category_id' => '8'
            ],
            [
                'permission_name' => $privolitev5,
                'category_id' => '8'
            ],
            [
                'permission_name' => $privolitev6,
                'category_id' => '8'
            ],
            [
                'permission_name' => $privolitev_sportno_vzgojni_karton,
                'category_id' => '9'
            ],
            [
                'permission_name' => $privolitev_svetovalna_sluzba1,
                'category_id' => '10'
            ],
            [
                'permission_name' => $privolitev_svetovalna_sluzba2,
                'category_id' => '10'
            ],
            [
                'permission_name' => $privolitev_posebna_1,
                'category_id' => '11'
            ],
            [
                'permission_name' => $privolitev_posebna_2,
                'category_id' => '11'
            ],
            [
                'permission_name' => $privolitev_posebna_3,
                'category_id' => '11'
            ],
            [
                'permission_name' => $privolitev_posebna_4,
                'category_id' => '11'
            ],


        ];
        foreach ($privolitve as $privolitev) {
            Permission::create($privolitev);
        }
    }
}
