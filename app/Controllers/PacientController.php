<?php

namespace App\Controllers;

class PacientController extends BaseController
{

    public function __construct() {
        $this->usersModel = new \App\Models\UsersModel();
        $this->loggedUserID = session()->get('loggedUser');
        $this->userInfo = $this->usersModel->find($this->loggedUserID);
        $this->postModel =  $this->usersModel = new \App\Models\PostModel();
        helper(['url', 'form']);
    }



    public function save() {

        $userModel = new \App\Models\GetUsersModel();

        $validation = $this->validate([
            'pacient_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Заглавието е задължително име е задължително!'
                ]
            ],

            'egn' => [
                'rules' => 'required|min_length[5]|max_length[10]',
                'errors' => [
                    'required' => 'Моля, въведете ЕГН',
                    'min_length' => 'ЕГН трябва да съдържа 10 символа',
                    'max_length' => 'ЕГН не трябва да съдържа повече от 10 символа',


                ]
            ],
        ]);

        $data = [
            'pageTitle' => 'Създаване на страница',
            'users' => $userModel->getUser(),
            'userInfo' =>  $this->userInfo,
            'validation' => $this->validator,
        ];
       
        

        if(!$validation) {
            return view('dashboard/create_pacient', $data);
        } else {

            $pacient_id = $this->request->getPost('pacient_id');
            $pacient_name = $this->request->getPost('pacient_name');
            $egn = $this->request->getPost('egn');
            $pacient_birthday = $this->request->getPost('pacient_birthday');
            $age = $this->request->getPost('age');
            $pacient_sex = $this->request->getPost('pacient_sex');
            $pacient_phone = $this->request->getPost('pacient_phone');
            $pacient_post_add = $this->request->getPost('pacient_post_add');
            $pacient_email = $this->request->getPost('pacient_email');
            $pacient_pridrujitel = $this->request->getPost('pacient_pridrujitel');
            $pridrujitel_status = $this->request->getPost('pridrujitel_status');
            $pridrujitel_phone = $this->request->getPost('pridrujitel_phone');
            $lekar_na_pacient = $this->request->getPost('lekar_na_pacient');
            $lekar_nomer = $this->request->getPost('lekar_nomer');
            $nevrolog = $this->request->getPost('nevrolog');
            $nevrolog_phone = $this->request->getPost('nevrolog_phone');
            $lice_podalo_inf = $this->request->getPost('lice_podalo_inf');
            $statut_na_lice_podalo = $this->request->getPost('statut_na_lice_podalo');
            $informacia_syglasie = $this->request->getPost('informacia_syglasie');
            $diagnoza = $this->request->getPost('diagnoza');
            $godina_na_diagnoza = $this->request->getPost('godina_na_diagnoza');
            $dozirovka_tabletki = $this->request->getPost('dozirovka_tabletki');
            $statut_na_pacienta = $this->request->getPost('statut_na_pacienta');
            $poiasninie_na_statut = $this->request->getPost('poiasninie_na_statut');
            $nomer_na_pompa = $this->request->getPost('nomer_na_pompa');
            $versia_na_pompa = $this->request->getPost('versia_na_pompa');
            $data_na_postaviane_peg = $this->request->getPost('data_na_postaviane_peg');
            $data_za_podmiana_peg = $this->request->getPost('data_za_podmiana_peg');
            $medicinsko_zavedenie_peg = $this->request->getPost('medicinsko_zavedenie_peg');
            $gastroenterolog_peg = $this->request->getPost('gastroenterolog_peg');
            $fiksirana_tryba = $this->request->getPost('fiksirana_tryba');
            $data_na_Izpisvane = $this->request->getPost('data_na_Izpisvane');
            $prichina_za_spirane_terapia = $this->request->getPost('prichina_za_spirane_terapia');
            $otpadnal_pacient = $this->request->getPost('otpadnal_pacient');
            $prichina_za_otpadnal = $this->request->getPost('prichina_za_otpadnal');
            $terapia = $this->request->getPost('terapia');
            $dozirovka = $this->request->getPost('dozirovka');
            $data_na_dozirovka_startirane = $this->request->getPost('data_na_dozirovka_startirane');
            $dosirovki_pri_startirane = $this->request->getPost('dosirovki_pri_startirane');
            $data_izpisvane = $this->request->getPost('data_izpisvane');
            $dozirovki_na_data_izpisvane = $this->request->getPost('dozirovki_na_data_izpisvane');
            $data_dozirovki = $this->request->getPost('data_dozirovki');
            $data_dozirovki_2 = $this->request->getPost('data_dozirovki_2');
            $data_dozirovki_3 = $this->request->getPost('data_dozirovki_3');
            $data_dozirovki_4 = $this->request->getPost('data_dozirovki_4');
            $data_dozirovki_5 = $this->request->getPost('data_dozirovki_5');
            $tip_pompa = $this->request->getPost('tip_pompa');
            $serien_pompa = $this->request->getPost('serien_pompa');
            $srok_godnost_pompa = $this->request->getPost('srok_godnost_pompa');
            $data_na_predavane = $this->request->getPost('data_na_predavane');
            $serien_nomer_vyrnata = $this->request->getPost('serien_nomer_vyrnata');
            $data_na_prietata_pompa = $this->request->getPost('data_na_prietata_pompa');
            $komentar_prichina = $this->request->getPost('komentar_prichina');
            $otgovorno_lice_pompata = $this->request->getPost('otgovorno_lice_pompata');
            $data_za_remont = $this->request->getPost('data_za_remont');
            $data_za_poluchavane_remont = $this->request->getPost('data_za_poluchavane_remont');
            $komentar = $this->request->getPost('komentar');
            $predostavena_hladilna_chanta = $this->request->getPost('predostavena_hladilna_chanta');
            $predostavena_hladilna_chanta_protokol = $this->request->getPost('predostavena_hladilna_chanta_protokol');
            $data_za_hospitalizacia_na_pacienta_med_odobrenie = $this->request->getPost('data_za_hospitalizacia_na_pacienta_med_odobrenie');
            $medicinsko_zavedenie_predvaritelno_odobrenie = $this->request->getPost('medicinsko_zavedenie_predvaritelno_odobrenie');
            $data_za_zapisvane_na_pacient = $this->request->getPost('data_za_zapisvane_na_pacient');
            $reshenie_na_ekspertna_lekarska_komisia = $this->request->getPost('reshenie_na_ekspertna_lekarska_komisia');
            $data_za_podavane_rzok = $this->request->getPost('data_za_podavane_rzok');
            $data_za_uvedomlenie_rzok = $this->request->getPost('data_za_uvedomlenie_rzok');
            $broy_kalendarni_dni_rzok = $this->request->getPost('broy_kalendarni_dni_rzok');
            $anketa_za_medikamenti = $this->request->getPost('anketa_za_medikamenti');
            $protokol_nomer = $this->request->getPost('protokol_nomer');
            $data_na_podaden_protokol_nzok = $this->request->getPost('data_na_podaden_protokol_nzok');
            $protokol_validen = $this->request->getPost('protokol_validen');
            $data_za_sledvasht_protokol = $this->request->getPost('data_za_sledvasht_protokol');
            $dni_do_podavane_za_protokol = $this->request->getPost('dni_do_podavane_za_protokol');
            $dni_na_pyrva_RP = $this->request->getPost('dni_na_pyrva_RP');
            $slujitel_ime = $this->request->getPost('slujitel_ime');
            $data_raredis = $this->request->getPost('data_raredis');
            $chas_raredis = $this->request->getPost('chas_raredis');
            $kom_kanal = $this->request->getPost('kom_kanal');
            $povod = $this->request->getPost('povod');
            $raredis_komentar = $this->request->getPost('raredis_komentar');
            $podgotvena_dokumentacia = $this->request->getPost('podgotvena_dokumentacia');
            $vid_dokumentacia = $this->request->getPost('vid_dokumentacia');
            $raredis_komentar_2 = $this->request->getPost('raredis_komentar_2');
            $nomer_protokol_dokladvan = $this->request->getPost('nomer_protokol_dokladvan');
            $opisanie_prichina = $this->request->getPost('opisanie_prichina');
            $nlr_dokladvan = $this->request->getPost('nlr_dokladvan');
            $data_poluchen_protokol_nzok = $this->request->getPost('data_poluchen_protokol_nzok');
            $data_na_hospitalizacia_medicinsko_odobrenie = $this->request->getPost('data_na_hospitalizacia_medicinsko_odobrenie');
            $data_zapochvane_nis = $this->request->getPost('data_zapochvane_nis');

            $values = [
                'pacient_id' =>                                         $pacient_id,
                'pacient_name' =>                                       $pacient_name,
                'egn' =>                                                $egn,
                'pacient_birthday' =>                                   $pacient_birthday,
                'age' =>                                                $age,
                'pacient_sex' =>                                        $pacient_sex,
                'pacient_phone' =>                                      $pacient_phone,
                'pacient_post_add' =>                                   $pacient_post_add,
                'pacient_email' =>                                      $pacient_email,
                'pacient_pridrujitel' =>                                $pacient_pridrujitel ,
                'pridrujitel_status' =>                                 $pridrujitel_status,
                'pridrujitel_phone' =>                                  $pridrujitel_phone,
                'lekar_na_pacient' =>                                   $lekar_na_pacient,
                'lekar_nomer' =>                                        $lekar_nomer,
                'nevrolog' =>                                           $nevrolog,
                'nevrolog_phone' =>                                     $nevrolog_phone,
                'lice_podalo_inf' =>                                    $lice_podalo_inf,
                'statut_na_lice_podalo' =>                              $statut_na_lice_podalo,
                'informacia_syglasie' =>                                $informacia_syglasie,
                'diagnoza' =>                                           $diagnoza,
                'godina_na_diagnoza' =>                                 $godina_na_diagnoza,
                'dozirovka_tabletki' =>                                 $dozirovka_tabletki,
                'statut_na_pacienta' =>                                 $statut_na_pacienta,
                'poiasninie_na_statut' =>                               $poiasninie_na_statut,
                'nomer_na_pompa' =>                                     $nomer_na_pompa,
                'versia_na_pompa' =>                                    $versia_na_pompa,
                'data_na_postaviane_peg' =>                             $data_na_postaviane_peg,
                'data_za_podmiana_peg' =>                               $data_za_podmiana_peg,
                'medicinsko_zavedenie_peg' =>                           $medicinsko_zavedenie_peg,
                'gastroenterolog_peg' =>                                $gastroenterolog_peg,
                'fiksirana_tryba' =>                                    $fiksirana_tryba,
                'data_na_Izpisvane' =>                                  $data_na_Izpisvane,
                'prichina_za_spirane_terapia' =>                        $prichina_za_spirane_terapia,
                'otpadnal_pacient' =>                                   $otpadnal_pacient,
                'prichina_za_otpadnal' =>                               $prichina_za_otpadnal,
                'terapia' =>                                            $terapia,
                'dozirovka' =>                                          $dozirovka,
                'data_na_dozirovka_startirane' =>                       $data_na_dozirovka_startirane,
                'dosirovki_pri_startirane' =>                           $dosirovki_pri_startirane,
                'data_izpisvane' =>                                     $data_izpisvane,
                'dozirovki na data_izpisvane' =>                        $dozirovki_na_data_izpisvane,
                'data_dozirovki' =>                                     $data_dozirovki,
                'data_dozirovki_2' =>                                   $data_dozirovki_2,
                'data_dozirovki_3' =>                                   $data_dozirovki_3,
                'data_dozirovki_4' =>                                   $data_dozirovki_4,
                'data_dozirovki_5' =>                                   $data_dozirovki_5,
                'tip_pompa' =>                                          $tip_pompa,
                'serien_pompa' =>                                       $serien_pompa,
                'srok_godnost_pompa' =>                                 $srok_godnost_pompa,
                'data_na_predavane' =>                                  $data_na_predavane,
                'serien_nomer_vyrnata' =>                               $serien_nomer_vyrnata,
                'data_na_prietata_pompa' =>                             $data_na_prietata_pompa,
                'komentar_prichina' =>                                  $komentar_prichina,
                'otgovorno_lice_pompata' =>                             $otgovorno_lice_pompata,
                'data_za_remont' =>                                     $data_za_remont,
                'data_za_poluchavane_remont' =>                         $data_za_poluchavane_remont,
                'komentar' =>                                           $komentar,
                'predostavena_hladilna_chanta' =>                       $predostavena_hladilna_chanta,
                'predostavena_hladilna_chanta_protokol' =>              $predostavena_hladilna_chanta_protokol,
                'data_za_hospitalizacia_na_pacienta_med_odobrenie' =>   $data_za_hospitalizacia_na_pacienta_med_odobrenie,
                'medicinsko_zavedenie_predvaritelno_odobrenie' =>       $medicinsko_zavedenie_predvaritelno_odobrenie,
                'data_za_zapisvane_na_pacient' =>                       $data_za_zapisvane_na_pacient,
                'reshenie_na_ekspertna_lekarska_komisia' =>             $reshenie_na_ekspertna_lekarska_komisia,
                'data_za_podavane_rzok' =>          $data_za_podavane_rzok,
                'data_za_uvedomlenie_rzok' =>       $data_za_uvedomlenie_rzok,
                'broy_kalendarni_dni_rzok' =>       $broy_kalendarni_dni_rzok,
                'anketa_za_medikamenti' =>          $anketa_za_medikamenti,
                'protokol_nomer' =>                 $protokol_nomer,
                'data_na_podaden_protokol_nzok' => $data_na_podaden_protokol_nzok,
                'protokol_validen' =>               $protokol_validen,
                'data_za_sledvasht_protokol' =>     $data_za_sledvasht_protokol,
                'dni_do_podavane_za_protokol' =>    $dni_do_podavane_za_protokol,
                'dni_na_pyrva_RP' =>                $dni_na_pyrva_RP,
                'slujitel_ime' =>                   $slujitel_ime,
                'data_raredis' =>                   $data_raredis,
                'chas_raredis' =>                   $chas_raredis,
                'kom_kanal' =>                      $kom_kanal,
                'povod' =>                          $povod,
                'raredis_komentar' =>               $raredis_komentar,
                'podgotvena_dokumentacia' =>        $podgotvena_dokumentacia,
                'vid_dokumentacia' =>               $vid_dokumentacia,
                'raredis_komentar_2' =>             $raredis_komentar_2,
                'nomer_protokol_dokladvan' =>       $nomer_protokol_dokladvan,
                'opisanie_prichina' =>              $opisanie_prichina,
                'nlr_dokladvan' =>                  $nlr_dokladvan,
                'data_poluchen_protokol_nzok' =>    $data_poluchen_protokol_nzok,
                'data_na_hospitalizacia_medicinsko_odobrenie' => $data_na_hospitalizacia_medicinsko_odobrenie,
                'data_zapochvane_nis' =>          $data_zapochvane_nis,
            ];
 
            $pacientModel= new \App\Models\PacientsModel();
            $query = $pacientModel->insert($values);
 
            if(!$query) {
                return redirect()->to('/dashboard/pacients')->with('fail', 'Something went wrong!');
            } else {
                return redirect()->to('/dashboard/pacients')->with('success', 'Статията е добавена успешно!');
            }
        }
    }

    public function update($id = 0) {
        $userModel = new \App\Models\GetUsersModel();
        $postModel = new \App\Models\GetPostsModel();

        $validation = $this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Заглавието е задължително име е задължително!'
                ]
            ],

            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Заглавието е задължително име е задължително!'
                ]
            ],
        ]);

        $data = [
            'pageTitle' => 'Създаване на страница',
            'users' => $userModel->getUser(),
            'userInfo' =>  $this->userInfo,
            'validation' => $this->validator,
        ];
       
        

        if(!$validation) {
            return view('dashboard/create_post', $data);
        } else {
            $title = $this->request->getPost('title');
            $message = $this->request->getPost('content');
 
            $values = [
                'title' => $title,
                'content' => $message,
            ];

            $updatePost = new \App\Models\PostModel();
 
            $query = $updatePost->update($id, $values);
 
            if(!$query) {
                return redirect()->to('/dashboard/pacients')->with('fail', 'Something went wrong!');
            } else {
                return redirect()->to('/dashboard/pacients')->with('success', 'Статията е добавена успешно!');
            }
        }
    }



    public function delete ($id =0) {
        $postModel = new \App\Models\PostModel();

        if($postModel->find($id)) {
            $postModel->delete($id);
            session()->setFlashdata('success', 'Потребителят е изтрит успешно!');
        } else {
            session()->setFlashdata('fail', 'Потребителят не е изтрит!');
        }


        return redirect()->to('/dashboard/posts');
    }

    public function search_pacient() {
        $userModel = new \App\Models\GetUsersModel();
        $postModel = new \App\Models\PostModel();

        $request = service('request');
        $searchData = $request->getGet();
        $search = '';

        if(isset($searchData) && isset($searchData['search'])) {
            $search = $searchData['search'];
        }

        if($search == '') {
            $pagination = $postModel->paginate(4);
        } else {
            $pagination = $postModel->select('*')
            ->orLike('title', $search)
            ->orLike('content', $search)
            ->paginate(4);
        }


        $data = [
            'pageTitle' => 'Резултати от търсенето',
            'users' => $userModel->getUser(),
            'pager' => $postModel->pager,
            'search' => $search,
            'userInfo' =>  $this->userInfo,
        ];

        return view('dashboard/pacients', $data);
    }



}