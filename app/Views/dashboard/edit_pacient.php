<?= $this->extend('layout/dashboard-layout'); ?>
<?= $this->section('content'); ?>
    <h1 class="mb-3"><?= (isset($pageTitle)) ? $pageTitle : 'Document' ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form id="post-id" action="<?= base_url('PacientController/update/'.$pacient['id']); ?>" method="post">
                <?= csrf_field(); ?>

                <?php if(!empty(session()->getFlashdata('fail'))): ?>

                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('fail'); ?>
                    </div>

                <?php endif ?>

                <?php if(!empty(session()->getFlashdata('success'))): ?>

                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success'); ?>
                    </div>

                <?php endif ?>



                <ul class="nav nav-tabs" >
                    <li class="nav-item active">
                        <a
                                data-toggle="tab"
                                class="nav-link active"
                                href="#ex1-tabs-1">Информация за пациента</a>
                    </li>
                    <li class="nav-item">
                        <a
                                data-toggle="tab"
                                href="#ex1-tabs-2"
                                class="nav-link"
                        >Данни за заболяването - Болест на Паркинсон</a>
                    </li>
                    <li class="nav-item">
                        <a
                                data-toggle="tab"
                                href="#ex1-tabs-3"
                                class="nav-link"
                        >Включване на пациент на медикамент по програмата</a>
                    </li>
                    <li class="nav-item">
                        <a
                                data-toggle="tab"
                                href="#ex1-tabs-4"
                                class="nav-link"
                        >Титриране на пациент на медикамент по програмата </a>
                    </li>
                    <li class="nav-item">
                        <a
                                data-toggle="tab"
                                href="#ex1-tabs-5"
                                class="nav-link"
                        >Консумативи по програмата</a>
                    </li>
                    <li class="nav-item">
                        <a
                                data-toggle="tab"
                                href="#ex1-tabs-6"
                                class="nav-link"
                        > Включване на пациент на медикамент по програмата по процедури на НЗОК</a>
                    </li>
                    <li class="nav-item">
                        <a
                                data-toggle="tab"
                                href="#ex1-tabs-7"
                                class="nav-link"
                        >Поддържане на пациент на медикамент по програмата според процедурите на НЗОК </a>
                    </li>
                    <li class="nav-item">
                        <a
                                data-toggle="tab"
                                href="#ex1-tabs-8"
                                class="nav-link">Комуникация от служител на МЦ Раредис с пациент по програмата</a>
                    </li>
                </ul>

                <div class="tab-content mt-5">

                    <div id="ex1-tabs-1" class="tab-pane fade show active">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pacient_id" class="d-block">
                                        <div class="input-title">Код на пациента</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'pacient_id') : '' ?></span>
                                        <input id="pacient_id" type="text" class="form-control form-control-user" name="pacient_id" value="<?= esc($pacient['pacient_id']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="pacient_name" class="d-block">
                                        <div class="input-title">Трите имена на пациента</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'pacient_name') : '' ?></span>
                                        <input id="pacient_name" type="text" class="form-control form-control-user" name="pacient_name" value="<?= esc($pacient['pacient_name']); ?>" >
                                    </label>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="egn" class="d-block">
                                        <div class="input-title">ЕГН</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'egn') : '' ?></span>
                                        <input id="egn" type="text" class="form-control form-control-user"  name="egn" value="<?= esc($pacient['egn']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="pacient_birthday" class="d-block">
                                        <div class="input-title">Дата на раждане</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'pacient_birthday') : '' ?></span>
                                        <input id="pacient_birthday"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата" aria-label="Календар"
                                               name="pacient_birthday" value="<?= set_value('',  date('d/m/Y', strtotime($pacient['pacient_birthday']))) ?>" >

                                    </label>

                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="pacient_sex" class="d-block">
                                        <div class="input-title">Пол </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'pacient_sex') : '' ?></span>
                                        <select name="pacient_sex" id="pacient_sex"  class="form-control form-control-user">
                                            <option value="<?= set_value('', 'Мъж') ?>" <?= $pacient['pacient_sex'] == 'Мъж' ? 'selected="selected"':''; ?>>Мъж</option>
                                            <option value="<?= set_value('', 'Жена') ?>" <?= $pacient['pacient_sex'] == 'Жена' ? 'selected="selected"':''; ?>>Жена</option>
                                        </select>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pacient_phone" class="d-block">
                                        <div class="input-title">Мобилен номер на пациента</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'pacient_phone') : '' ?></span>
                                        <input id="pacient_phone" type="text" class="form-control form-control-user" name="pacient_phone" value="<?= esc($pacient['pacient_phone']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="pacient_post_add" class="d-block">
                                        <div class="input-title">Пощенски адрес на пациента (Град, пощенски код, улица, N / бл. Вх. Ап.</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'pacient_post_add') : '' ?></span>
                                        <input id="pacient_post_add" type="text" class="form-control form-control-user" name="pacient_post_add" value="<?= esc($pacient['pacient_post_add']); ?>" >
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pacient_email" class="d-block">
                                        <div class="input-title">E-mail/Skype</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'pacient_email') : '' ?></span>
                                        <input id="pacient_email" type="text" class="form-control form-control-user" name="pacient_email" value="<?= esc($pacient['pacient_email']); ?>" >
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label for="pacient_pridrujitel" class="d-block">
                                        <div class="input-title">Придружител на пациента (Име, Фамилия)</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'pacient_pridrujitel') : '' ?></span>
                                        <input id="pacient_pridrujitel" type="text" class="form-control form-control-user" name="pacient_pridrujitel" value="<?= esc($pacient['pacient_pridrujitel']); ?>" >
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pridrujitel_status" class="d-block">
                                        <div class="input-title">Придружител (Статут)</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'pridrujitel_status') : '' ?></span>
                                        <input id="pridrujitel_status" type="text" class="form-control form-control-user" name="pridrujitel_status" value="<?= esc($pacient['pridrujitel_status']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="pridrujitel_phone" class="d-block">
                                        <div class="input-title">Мобилен номер на придружител на пациента</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'pridrujitel_phone') : '' ?></span>
                                        <input id="pridrujitel_phone" type="text" class="form-control form-control-user" name="pridrujitel_phone" value="<?= esc($pacient['pridrujitel_phone']); ?>" >
                                    </label>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="lekar_na_pacient" class="d-block">
                                        <div class="input-title">Общопрактикуващ лекар на пациента (име, фамилия)</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'lekar_na_pacient') : '' ?></span>
                                        <input id="lekar_na_pacient" type="text" class="form-control form-control-user"  name="lekar_na_pacient" value="<?= esc($pacient['lekar_na_pacient']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="lekar_nomer" class="d-block">
                                        <div class="input-title">Общопрактикуващ лекар мобилен номер</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'lekar_nomer') : '' ?></span>
                                        <input id="lekar_nomer" type="text" class="form-control form-control-user"  name="lekar_nomer" value="<?= esc($pacient['lekar_nomer']); ?>" >
                                    </label>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nevrolog" class="d-block">
                                        <div class="input-title">Наблюдаващ невролог по местоживеене ( име, фамилия)</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nevrolog') : '' ?></span>
                                        <input id="nevrolog" type="text" class="form-control form-control-user"  name="nevrolog" value="<?= esc($pacient['nevrolog']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="nevrolog_phone" class="d-block">
                                        <div class="input-title">Наблюдаващ невролог по местоживеене мобилен телефон</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nevrolog_phone') : '' ?></span>
                                        <input id="nevrolog_phone" type="text" class="form-control form-control-user"  name="nevrolog_phone" value="<?= esc($pacient['nevrolog_phone']); ?>" >
                                    </label>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="lice_podalo_inf" class="d-block">
                                        <div class="input-title">Лице подало информацията за потенциалния пациент (Име, фамилия )</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'lice_podalo_inf') : '' ?></span>
                                        <input id="lice_podalo_inf" type="text" class="form-control form-control-user"  name="lice_podalo_inf" value="<?= esc($pacient['lice_podalo_inf']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="statut_na_lice_podalo" class="d-block">
                                        <div class="input-title">Статут на лице подало информацията за потенциалния пациент</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'statut_na_lice_podalo') : '' ?></span>
                                        <input id="statut_na_lice_podalo" type="text" class="form-control form-control-user" name="statut_na_lice_podalo" value="<?= esc($pacient['statut_na_lice_podalo']); ?>" >
                                    </label>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="statut_na_lice_podalo" class="d-block">
                                    <div class="input-title">Информирано съгласие от пациета за включване в програмата</div>
                                    <span class="text-danger"><?= isset($validation) ? display_error($validation, 'statut_na_lice_podalo') : '' ?></span>
                                    <select name="informacia_syglasie" id="informacia_syglasie" class="form-control form-control-user">
                                        <option value="<?= set_value('','Да') ?>"  <?= $pacient['statut_na_lice_podalo'] == 'Да' ? 'selected="selected"':''; ?>>Да</option>
                                        <option value="<?= set_value('','Нe') ?>" <?= $pacient['statut_na_lice_podalo'] == 'Нe' ? 'selected="selected"':''; ?>>Не</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div> <!--end  tab-content -->

                    <div id="ex1-tabs-2" class="tab-pane fade">
                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="diagnoza" class="d-block">
                                        <div class="input-title">Диагноза</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'diagnoza') : '' ?></span>
                                        <textarea id="diagnoza" type="text" class="textarea form-control form-control-user full-width" name="diagnoza" cols="30" rows="10">
                                    <?= esc($pacient['diagnoza']); ?>
                                </textarea>
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label for="godina_na_diagnoza" class="d-block">
                                        <div class="input-title">Година на диагностициране на заболяването</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'godina_na_diagnoza') : '' ?></span>
                                        <input id="godina_na_diagnoza"
                                               type="text" class="datepicker_input form-control form-control-user full-width"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="godina_na_diagnoza"
                                               value="<?= set_value('', date('d/m/Y', strtotime($pacient['godina_na_diagnoza']))); ?>" >
                                    </label>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">


                            <div class="row">
                                <div class="col-md-6">
                                    <label for="dozirovka_tabletki" class="d-block">
                                        <div class="input-title">Дозировка на Леводопа (таблетки) </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'dozirovka_tabletki') : '' ?></span>
                                        <input id="dozirovka_tabletki" type="text" class="form-control form-control-user full-width" name="dozirovka_tabletki" value="<?= esc($pacient['dozirovka_tabletki']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="godina_na_diagnoza" class="d-block">
                                        <div class="input-title">Статут на пациента</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'godina_na_diagnoza') : '' ?></span>

                                        <select class="form-control form-control-user full-width" name="statut_na_pacienta" id="statut_na_pacienta">
                                            <option value="<?= set_value('','На започващо лечение' )?>" <?= $pacient['statut_na_pacienta'] == 'На започващо лечение' ? 'selected="selected"':''; ?>>На започващо лечение</option>
                                            <option value="<?= set_value('', 'Включен на мостри')?>" <?= $pacient['statut_na_pacienta'] == 'Включен на мостри' ? 'selected="selected"':''; ?>>Включен на мостри</option>
                                            <option value="<?= set_value('', 'Превключен от LCIG')?>" <?= $pacient['statut_na_pacienta'] == 'Превключен от LCIG' ? 'selected="selected"':''; ?>>Превключен от LCIG</option>
                                            <option value="<?= set_value('', 'Одобрен от НЗОК')?>" <?= $pacient['statut_na_pacienta'] == 'Одобрен от НЗОК' ? 'selected="selected"':''; ?>>Одобрен от НЗОК </option>
                                            <option value="<?= set_value('', 'Одобрен от РЗОК' )?>" <?= $pacient['statut_na_pacienta'] == 'Одобрен от РЗОК' ? 'selected="selected"':''; ?>>Одобрен от РЗОК </option>
                                            <option value="<?= set_value('', 'На текущо лечение')?>" <?= $pacient['statut_na_pacienta'] == 'На текущо лечение' ? 'selected="selected"':''; ?>>На текущо лечение</option>
                                            <option value="<?= set_value('', 'Отпаднал НИС')?>" <?= $pacient['statut_na_pacienta'] == 'Отпаднал НИС' ? 'selected="selected"':''; ?>>Отпаднал НИС</option>
                                            <option value="<?= set_value('', 'Отпаднал ПЕГ')?>" <?= $pacient['statut_na_pacienta'] == 'Отпаднал ПЕГ' ? 'selected="selected"':''; ?>>Отпаднал ПЕГ</option>
                                            <option value="<?= set_value('', 'Починал') ?>" <?= $pacient['statut_na_pacienta'] == 'Починал' ? 'selected="selected"':''; ?>>Починал</option>
                                        </select>

                                    </label>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="poiasninie_na_statut" class="d-block">
                                        <div class="input-title">Пояснения към статута</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'poiasninie_na_statut') : '' ?></span>
                                        <input id="poiasninie_na_statut" type="text" class="form-control form-control-user full-width" name="poiasninie_na_statut" value="<?= esc($pacient['poiasninie_na_statut']); ?>" >
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div><!--end  tab-content -->

                    <div id="ex1-tabs-3" class="tab-pane fade">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nomer_na_pompa" class="d-block">
                                        <div class="input-title">№ на предоставена на пациента помпа</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nomer_na_pompa') : '' ?></span>
                                        <input id="nomer_na_pompa" type="text" class="form-control form-control-user" name="nomer_na_pompa" value="<?= esc($pacient['nomer_na_pompa']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="versia_na_pompa" class="d-block">
                                        <div class="input-title">Версия на предоставена на пациента помпа</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'versia_na_pompa') : '' ?></span>
                                        <input id="versia_na_pompa" type="text" class="form-control form-control-user" name="versia_na_pompa" value="<?= esc($pacient['versia_na_pompa']); ?>" >
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="versia_na_pompa" class="d-block">
                                        <div class="input-title">Дата на предоставяне на помпа</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_na_postaviane_peg') : '' ?></span>
                                        <input id="data_na_postaviane_peg"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_na_postaviane_peg"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_na_postaviane_peg']))) ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="data_zapochvane_nis" class="d-block">
                                        <div class="input-title">Дата на започване процеса на НИС</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_zapochvane_nis') : '' ?></span>
                                        <input id="data_zapochvane_nis"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_zapochvane_nis"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_zapochvane_nis']))) ?>" >
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="medicinsko_zavedenie_peg" class="d-block">
                                        <div class="input-title">Медицинско лечебно заведение за титрация на пациента</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'medicinsko_zavedenie_peg') : '' ?></span>
                                        <input id="medicinsko_zavedenie_peg" type="text" class="form-control form-control-user" name="medicinsko_zavedenie_peg" value="<?= esc($pacient['medicinsko_zavedenie_peg']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="gastroenterolog_peg" class="d-block">
                                        <div class="input-title">Невролог при титрация (Име, Фамилия) опция за добавяне на няколко имена</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'gastroenterolog_peg') : '' ?></span>
                                        <input id="gastroenterolog_peg" type="text" class="form-control form-control-user" name="gastroenterolog_peg" value="<?= esc($pacient['gastroenterolog_peg']); ?>" >
                                    </label>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_na_postaviane_peg" class="d-block">
                                        <div class="input-title">Дата на първоначално поставяне на ПЕГ</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_na_postaviane_peg') : '' ?></span>
                                        <input id="data_na_postaviane_peg"
                                               type="text"
                                               class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_na_postaviane_peg" value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_na_postaviane_peg']))) ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="data_za_podmiana_peg" class="d-block">
                                        <div class="input-title">Дата за планова подмяна на ПЕГ и вътрешна тръба</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_za_podmiana_peg') : '' ?></span>
                                        <input id="data_za_podmiana_peg"
                                               type="text"
                                               class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_za_podmiana_peg"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_za_podmiana_peg']))) ?>" >
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="medicinsko_zavedenie_peg" class="d-block">
                                        <div class="input-title"> Медицинско лечебно заведение за поставяне на ПЕГ</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'medicinsko_zavedenie_peg') : '' ?></span>
                                        <input id="medicinsko_zavedenie_peg" type="text" class="form-control form-control-user" name="medicinsko_zavedenie_peg" value="<?= esc($pacient['medicinsko_zavedenie_peg']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="gastroenterolog_peg" class="d-block">
                                        <div class="input-title"> Гастроентеролог поставил ПЕГ (Име, Фамилия)</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'gastroenterolog_peg') : '' ?></span>
                                        <input id="gastroenterolog_peg" type="text" class="form-control form-control-user" name="gastroenterolog_peg" value="<?= esc($pacient['gastroenterolog_peg']); ?>" >
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fiksirana_tryba" class="d-block">
                                        <div class="input-title">Фиксирана вътр. тръба на ....см</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'fiksirana_tryba') : '' ?></span>
                                        <input id="fiksirana_tryba" type="text" class="form-control form-control-user" name="fiksirana_tryba" value="<?= esc($pacient['fiksirana_tryba']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="fiksirana_tryba" class="d-block">
                                        <div class="input-title">Дата на изписване на пациента</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_na_Izpisvane') : '' ?></span>
                                        <input id="data_na_Izpisvane"
                                               type="text"
                                               class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_na_Izpisvane"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_na_Izpisvane']))) ?>" >
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prichina_za_spirane_terapia" class="d-block">
                                        <div class="input-title">Причини за временно спиране/забавяне на терапията</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'prichina_za_spirane_terapia') : '' ?></span>
                                        <input id="prichina_za_spirane_terapia" type="text" class="form-control form-control-user" name="prichina_za_spirane_terapia" value="<?= esc($pacient['prichina_za_spirane_terapia']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="otpadnal_pacient" class="d-block">
                                        <div class="input-title">Отпадане на пациент на дата</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'otpadnal_pacient') : '' ?></span>
                                        <input id="	otpadnal_pacient"
                                               type="text"
                                               class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="otpadnal_pacient"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['otpadnal_pacient']))) ?>" >
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="prichina_za_otpadnal" class="d-block">
                                        <div class="input-title">Причина за отпадане на пациента</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'prichina_za_otpadnal') : '' ?></span>
                                        <input id="	prichina_za_otpadnal" type="text" class="form-control form-control-user" name="prichina_za_otpadnal" value="<?= esc($pacient['prichina_za_otpadnal']); ?>" >
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div><!--end tab-content-->

                    <div id="ex1-tabs-4" class="tab-pane fade">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="terapia" class="d-block">
                                        <div class="input-title">Терапия</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'terapia') : '' ?></span>
                                        <input id="terapia" type="text" class="form-control form-control-user" name="terapia" value="<?= esc($pacient['terapia']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="dozirovka" class="d-block">
                                        <div class="input-title">Дозировка</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'dozirovka') : '' ?></span>
                                        <textarea name="dozirovka" class="textarea form-control form-control-user" id="dozirovka" cols="30" rows="10">
                                    <?= $pacient['dozirovka'] ?>
                                </textarea>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_na_dozirovka_startirane" class="d-block">
                                        <div class="input-title">Дата на първоначални дозировки при стартиране</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_na_dozirovka_startirane') : '' ?></span>
                                        <input id="data_na_dozirovka_startirane"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_na_dozirovka_startirane"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_na_dozirovka_startirane']))) ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="dosirovki_pri_startirane" class="d-block">
                                        <div class="input-title">Първоначални дозировки при стартиране</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'dosirovki_pri_startirane') : '' ?></span>
                                        <input id="dosirovki_pri_startirane" type="text" class="form-control form-control-user" name="dosirovki_pri_startirane" value="<?= esc($pacient['dosirovki_pri_startirane']); ?>" >
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_izpisvane" class="d-block">
                                        <div class="input-title">Дата на изписване</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_izpisvane') : '' ?></span>
                                        <input id="data_izpisvane" type="text" class="datepicker_input form-control form-control-user"  placeholder="Моля, въведете дата required aria-label="Календар" name="data_izpisvane" value="<?= set_value('data_izpisvane'); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="dozirovki_na_data_izpisvane" class="d-block">
                                        <div class="input-title">Дозировки на дата при изписване </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'dozirovki_na_data_izpisvane') : '' ?></span>
                                        <textarea name="dozirovki_na_data_izpisvane" id="dozirovki_na_data_izpisvane" class="textarea form-control form-control-user" cols="30" rows="10">
                                    <?= $pacient['dozirovki_na_data_izpisvane'] ?>
                                </textarea>
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_dozirovki" class="d-block">
                                        <div class="input-title">Дата/Дозировки</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_dozirovki') : '' ?></span>
                                        <textarea name="data_dozirovki" id="data_dozirovki" class="textarea form-control form-control-user" cols="30" rows="10">
                                    <?= $pacient['data_dozirovki'] ?>
                                </textarea>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="data_dozirovki_2" class="d-block">
                                        <div class="input-title">Дата/Дозировки</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_dozirovki_2') : '' ?></span>
                                        <textarea name="data_dozirovki_2" id="data_dozirovki_2" class="textarea form-control form-control-user" cols="30" rows="10">
                                    <?= $pacient['data_dozirovki_2'] ?>
                                </textarea>
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_dozirovki_3" class="d-block">
                                        <div class="input-title">Дата/Дозировки</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_dozirovki_3') : '' ?></span>
                                        <textarea name="data_dozirovki_3" id="data_dozirovki_3" class="textarea form-control form-control-user" cols="30" rows="10">
                                     <?= $pacient['data_dozirovki_3'] ?>
                                </textarea>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="data_dozirovki_4" class="d-block">
                                        <div class="input-title">Дата/Дозировки</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_dozirovki_4') : '' ?></span>
                                        <textarea name="data_dozirovki_4" id="data_dozirovki_4" class="textarea form-control form-control-user" cols="30" rows="10">
                                    <?= $pacient['data_dozirovki_4'] ?>
                                </textarea>
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_dozirovki_5" class="d-block">
                                        <div class="input-title">Дата/Дозировки</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_dozirovki_5') : '' ?></span>
                                        <textarea name="data_dozirovki_5" id="data_dozirovki_5" class="textarea form-control form-control-user" cols="30" rows="10">
                                     <?= $pacient['data_dozirovki_5'] ?>
                                </textarea>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div> <!--nd tab-content-->

                    <div id="ex1-tabs-5" class="tab-pane fadet">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tip_pompa" class="d-block">
                                        <div class="input-title">Тип помпа (избор от меню)</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'tip_pompa') : '' ?></span>
                                        <select name="tip_pompa" id="tip_pompa" class="form-control form-control-user">
                                            <option value="<?= set_value('','Нова '); ?>" <?= $pacient['tip_pompa'] == 'Нова' ? 'selected="selected"':''; ?>>Нова</option>
                                            <option value="<?= set_value('','Стара '); ?>" <?= $pacient['tip_pompa'] == 'Стара' ? 'selected="selected"':''; ?>>Стара</option>
                                            <option value="<?= set_value('','За ремонт'); ?>" <?= $pacient['tip_pompa'] == 'За ремонт' ? 'selected="selected"':''; ?>>За ремонт </option>
                                            <option value="<?= set_value('','Получена от ремонт'); ?>" <?= $pacient['tip_pompa'] == 'Получена от ремонт' ? 'selected="selected"':''; ?>>Получена от ремонт </option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="serien_pompa" class="d-block">
                                        <div class="input-title">Сериен № на помпа</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'serien_pompa') : '' ?></span>
                                        <textarea name="serien_pompa" id="serien_pompa" class="textarea form-control form-control-user" cols="30" rows="10">
                                    <?= $pacient['serien_pompa'] ?>
                                </textarea>
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="srok_godnost_pompa" class="d-block">
                                        <div class="input-title">Срок на годност на помпата (Дата, Месец, Година)</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'srok_godnost_pompa') : '' ?></span>
                                        <textarea name="serien_pompa" id="srok_godnost_pompa" class="textarea form-control form-control-user" cols="30" rows="10">
                                 <?= $pacient['srok_godnost_pompa'] ?>
                            </textarea>

                                        <input id="srok_godnost_pompa" type="text" class="form-control form-control-user" name="srok_godnost_pompa" value="<?= esc($pacient['srok_godnost_pompa']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="data_na_predavane" class="d-block">
                                        <div class="input-title">Дата на която е предадена на пациент</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_na_predavane') : '' ?></span>
                                        <textarea name="data_na_predavane" id="data_na_predavane" class="textarea form-control form-control-user" cols="30" rows="10">\
                                 <?= $pacient['data_na_predavane'] ?>
                            </textarea>
                                    </label>
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="serien_nomer_vyrnata" class="d-block">
                                        <div class="input-title">Сериен № на помпата която се връща от пациент</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'serien_nomer_vyrnata') : '' ?></span>
                                        <input id="serien_nomer_vyrnata" type="text" class="form-control form-control-user" name="serien_nomer_vyrnata" value="<?= esc($pacient['serien_nomer_vyrnata']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="data_na_prietata_pompa" class="d-block">
                                        <div class="input-title">Дата на която помпата е приета от пациент </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_na_prietata_pompa') : '' ?></span>
                                        <input id="data_na_prietata_pompa"
                                               type="text"
                                               class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_na_prietata_pompa"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_na_prietata_pompa']))) ?>" >
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="komentar_prichina" class="d-block">
                                        <div class="input-title">Коментар (причина за смяна) </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'komentar_prichina') : '' ?></span>
                                        <textarea name="komentar_prichina" id="komentar_prichina" class="textarea form-control form-control-user" cols="30" rows="10">
                                     <?= $pacient['komentar_prichina'] ?>
                                </textarea>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="otgovorno_lice_pompata" class="d-block">
                                        <div class="input-title">Отговорно за помпата лице</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'otgovorno_lice_pompata') : '' ?></span>
                                        <input id="otgovorno_lice_pompata" type="text" class="form-control form-control-user" name="otgovorno_lice_pompata" value="<?= esc($pacient['otgovorno_lice_pompata']); ?>" >
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_za_remont" class="d-block">
                                        <div class="input-title">Дата на предаване за ремонт </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_za_remont') : '' ?></span>
                                        <input id="data_za_remont"
                                               type="text"
                                               class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар" name="data_za_remont"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_za_remont']))) ?>" >
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label for="otgovorno_lice_pompata" class="d-block">
                                        <div class="input-title">Дата на получаване от ремонт </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_za_poluchavane_remont') : '' ?></span>
                                        <input id="data_za_poluchavane_remont" type="text" class="datepicker_input form-control form-control-user" name="data_za_poluchavane_remont" value="<?= esc($pacient['data_za_poluchavane_remont']); ?>" >
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="komentar" class="d-block">
                                        <div class="input-title">Коментар</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_za_remont') : '' ?></span>
                                        <textarea name="komentar" id="komentar" class="textarea form-control form-control-user" cols="30" rows="10">
                                     <?= $pacient['data_za_remont'] ?>
                                </textarea>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="predostavena_hladilna_chanta" class="d-block">
                                        <div class="input-title">Предоставена хладилна чанта: Дата</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'predostavena_hladilna_chanta') : '' ?></span>
                                        <input id="predostavena_hladilna_chanta"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="predostavena_hladilna_chanta"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['predostavena_hladilna_chanta']))) ?>" >
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="predostavena_hladilna_chanta_protokol" class="d-block">
                                        <div class="input-title">Предоставена хладилна чанта: Протокол N</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'predostavena_hladilna_chanta_protokol') : '' ?></span>
                                        <input id="predostavena_hladilna_chanta_protokol"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="predostavena_hladilna_chanta_protokol"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['predostavena_hladilna_chanta_protokol']))) ?>" >
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label for="data_na_hospitalizacia_medicinsko_odobrenie" class="d-block">
                                        <div class="input-title">Дата за хоспитализация на пациента за предварително медицинско одобрение </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_na_hospitalizacia_medicinsko_odobrenie') : '' ?></span>
                                        <input id="data_na_hospitalizacia_medicinsko_odobrenie"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_na_hospitalizacia_medicinsko_odobrenie"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_na_hospitalizacia_medicinsko_odobrenie']))) ?>" >
                                    </label>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="ex1-tabs-6" class="tab-pane fade">
                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="medicinsko_zavedenie_predvaritelno_odobrenie" class="d-block">
                                        <div class="input-title">Медицинско лечебно заведение за предварително медицинско одобрение</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'medicinsko_zavedenie_predvaritelno_odobrenie') : '' ?></span>
                                        <input id="medicinsko_zavedenie_predvaritelno_odobrenie" type="text" class="form-control form-control-user" name="medicinsko_zavedenie_predvaritelno_odobrenie" value="<?= set_value('medicinsko_zavedenie_predvaritelno_odobrenie'); ?>" >
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_za_zapisvane_na_pacient" class="d-block">
                                        <div class="input-title">Дата за записване на пациент за експертна лекарска комисия</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_za_zapisvane_na_pacient') : '' ?></span>
                                        <input id="data_za_zapisvane_na_pacient"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_za_zapisvane_na_pacient"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_za_zapisvane_na_pacient']))) ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="reshenie_na_ekspertna_lekarska_komisia" class="d-block">
                                        <div class="input-title">Решение на експертната лекарска комисия</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'reshenie_na_ekspertna_lekarska_komisia') : '' ?></span>
                                        <input id="reshenie_na_ekspertna_lekarska_komisia"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="reshenie_na_ekspertna_lekarska_komisia"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['reshenie_na_ekspertna_lekarska_komisia']))) ?>" >
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_za_podavane_rzok" class="d-block">
                                        <div class="input-title">Дата за подаване на документи от пациента в РЗОК</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_za_podavane_rzok') : '' ?></span>
                                        <input id="data_za_podavane_rzok"
                                               type="text"
                                               class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_za_podavane_rzok"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_za_podavane_rzok']))) ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="data_za_uvedomlenie_rzok" class="d-block">
                                        <div class="input-title">Дата на уведомление от РЗОК към пациента с решение</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_za_uvedomlenie_rzok') : '' ?></span>
                                        <input id="data_za_podavane_rzok"
                                               type="text"
                                               class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_za_uvedomlenie_rzok"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_za_uvedomlenie_rzok']))) ?>" >
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="broy_kalendarni_dni_rzok" class="d-block">
                                        <div class="input-title">Брой календарни дни от дата на внесени в РЗОК документи до дата на одобрение на протокола</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'broy_kalendarni_dni_rzok') : '' ?></span>
                                        <input
                                                id="broy_kalendarni_dni_rzok"
                                                type="text"
                                                class="form-control form-control-user"
                                                name="broy_kalendarni_dni_rzok"
                                                value="<?= set_value('broy_kalendarni_dni_rzok'); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="broy_kalendarni_dni_rzok" class="d-block">
                                        <div class="input-title">Аптека за получаване на медикамент по програмата</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'anketa_za_medikamenti') : '' ?></span>
                                        <textarea
                                                name="anketa_za_medikamenti"
                                                class="textarea form-control form-control-user"
                                                id="anketa_za_medikamenti" cols="30" rows="10">
                                      <?= $pacient['anketa_za_medikamenti'] ?>
                                </textarea>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div id="ex1-tabs-7" class="tab-pane fade">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="protokol_nomer" class="d-block">
                                        <div class="input-title">Протокол N</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'protokol_nomer') : '' ?></span>
                                        <input id="protokol_nomer" type="text" class="form-control form-control-user" name="protokol_nomer" value="<?= esc($pacient['protokol_nomer']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="data_na_podaden_protokol_nzok" class="d-block">
                                        <div class="input-title">Дата за подаден в НЗОК протокол </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_na_podaden_protokol_nzok') : '' ?></span>
                                        <input id="data_na_podaden_protokol_nzok"
                                               type="text"
                                               class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар" name="data_na_podaden_protokol_nzok"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_na_podaden_protokol_nzok']))) ?>" >
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_poluchen_protokol_nzok" class="d-block">
                                        <div class="input-title">Дата на получен протокол от НЗОК</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_poluchen_protokol_nzok') : '' ?></span>
                                        <input id="data_poluchen_protokol_nzok"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_poluchen_protokol_nzok"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_poluchen_protokol_nzok']))) ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="protokol_validen" class="d-block">
                                        <div class="input-title">Протокол валиден до дата</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'protokol_validen') : '' ?></span>
                                        <input id="protokol_validen"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар" name="protokol_validen"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['protokol_validen']))) ?>" >
                                    </label>
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="data_za_sledvasht_protokol" class="d-block">
                                        <div class="input-title">Дата за напомняне към пациент за следващия протокол</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_za_sledvasht_protokol') : '' ?></span>
                                        <input id="data_za_sledvasht_protokol"
                                               type="text" class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_za_sledvasht_protokol"
                                               value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_za_sledvasht_protokol']))) ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="dni_do_podavane_za_protokol" class="d-block">
                                        <div class="input-title">Дни до подаване на документи за следващия протокол</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'dni_do_podavane_za_protokol') : '' ?></span>
                                        <input id="dni_do_podavane_za_protokol" type="text" class="form-control form-control-user" name="dni_do_podavane_za_protokol" value="<?= set_value('dni_do_podavane_za_protokol'); ?>" >
                                    </label>
                                </div>
                            </div>



                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="dni_na_pyrva_RP" class="d-block">
                                        <div class="input-title">Дата на първа Rp. по протокол</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'dni_na_pyrva_RP') : '' ?></span>
                                        <input id="dni_na_pyrva_RP"
                                               type="text"
                                               class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="dni_na_pyrva_RP" value="<?= set_value('',  date('d/m/Y', strtotime($pacient['dni_na_pyrva_RP']))) ?>" >
                                    </label>
                                </div>
                            </div>


                        </div>


                    </div>

                    <div id="ex1-tabs-8" class="tab-pane fade">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="slujitel_ime" class="d-block">
                                        <div class="input-title">Служител по програмата (Име, Фамилия) </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, '
                                    ') : '' ?></span>
                                        <input id="slujitel_ime" type="text" class="form-control form-control-user" name="slujitel_ime" value="<?= esc($pacient['slujitel_ime']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="data_raredis" class="d-block">
                                        <div class="input-title">Дата</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'data_raredis') : '' ?></span>
                                        <input id="data_raredis"
                                               type="text"
                                               class="datepicker_input form-control form-control-user"
                                               placeholder="Моля, въведете дата"
                                               aria-label="Календар"
                                               name="data_raredis" value="<?= set_value('',  date('d/m/Y', strtotime($pacient['data_raredis']))) ?>" >
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="chas_raredis" class="d-block">
                                        <div class="input-title">Час</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'chas_raredis') : '' ?></span>
                                        <input id="chas_raredis" type="text" class="form-control form-control-user" name="chas_raredis" value="<?= esc($pacient['chas_raredis']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="chas_raredis" class="d-block">
                                        <div class="input-title">Комуникационен канал</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'kom_kanal') : '' ?></span>
                                        <select name="kom_kanal"  class="form-control form-control-user"  id="kom_kanal">
                                            <option value="<?= set_value('','На живо') ?>" <?= $pacient['kom_kanal'] == 'На живо' ? 'selected="selected"':''; ?>>На живо</option>
                                            <option value="<?= set_value('',' Мейл') ?>" <?= $pacient['kom_kanal'] == 'Мейл' ? 'selected="selected"':''; ?>>Мейл</option>
                                            <option value="<?= set_value('','Телефон') ?>" <?= $pacient['kom_kanal'] == 'Телефон' ? 'selected="selected"':''; ?>>Телефон</option>
                                            <option value="<?= set_value('','Онлайн') ?>" <?= $pacient['kom_kanal'] == 'Онлайн' ? 'selected="selected"':''; ?>>Онлайн</option>
                                        </select>
                                    </label>
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="povod" class="d-block">
                                        <div class="input-title">Повод</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'povod') : '' ?></span>
                                        <select name="povod"  class="form-control form-control-user"  id="povod">
                                            <option value="<?= set_value('','Обучение') ?>" <?= $pacient['povod'] == 'Обучение' ? 'selected="selected"':''; ?>>Обучение</option>
                                            <option value="<?= set_value('','Напомняне') ?>" <?= $pacient['povod'] == 'Напомняне' ? 'selected="selected"':''; ?>>Напомняне</option>
                                            <option value="<?= set_value('','Помпа') ?>" <?= $pacient['povod'] == 'Помпа' ? 'selected="selected"':''; ?>>Помпа</option>
                                            <option value="<?= set_value('','НЛР') ?>" <?= $pacient['povod'] == 'НЛР' ? 'selected="selected"':''; ?>>НЛР</option>
                                            <option value="<?= set_value('','Друго  ') ?>" <?= $pacient['povod'] == 'Друго' ? 'selected="selected"':''; ?>>Друго</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="raredis_komentar" class="d-block">
                                        <div class="input-title">Коментар</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'raredis_komentar') : '' ?></span>
                                        <textarea name="raredis_komentar" class="textarea form-control form-control-user" id="raredis_komentar" cols="30" rows="10">
                                    <?= $pacient['raredis_komentar'] ?>
                                </textarea>
                                    </label>
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="podgotvena_dokumentacia" class="d-block">
                                        <div class="input-title">Повод</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'podgotvena_dokumentacia') : '' ?></span>
                                        <select name="podgotvena_dokumentacia"  class="form-control form-control-user"  id="podgotvena_dokumentacia">
                                            <option value="<?= set_value('','Да') ?>" <?= $pacient['podgotvena_dokumentacia'] == 'Да' ? 'selected="selected"':''; ?>>Да</option>
                                            <option value="<?= set_value('','Не') ?>" <?= $pacient['podgotvena_dokumentacia'] == 'Не' ? 'selected="selected"':''; ?>>Не</option>
                                        </select>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="chas_raredis" class="d-block">
                                        <div class="input-title">Вид документация </div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'vid_dokumentacia') : '' ?></span>
                                        <input id="vid_dokumentacia" type="text" class="form-control form-control-user" name="vid_dokumentacia" value="<?= esc($pacient['vid_dokumentacia']); ?>" >
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="raredis_komentar_2" class="d-block">
                                        <div class="input-title">Коментар</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'raredis_komentar_2') : '' ?></span>
                                        <textarea name="raredis_komentar_2" class="textarea form-control form-control-user" id="raredis_komentar_2" cols="30" rows="10">
                                    <?= $pacient['raredis_komentar_2'] ?>
                                </textarea>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="nomer_protokol_dokladvan" class="d-block">
                                        <div class="input-title">N на протокола за НЛР докладван към служител на МЦ Раредис</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nomer_protokol_dokladvan') : '' ?></span>
                                        <input id="nomer_protokol_dokladvan" type="text" class="form-control form-control-user" name="nomer_protokol_dokladvan" value="<?= esc($pacient['nomer_protokol_dokladvan']); ?>" >
                                    </label>
                                </div>
                            </div>

                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="opisanie_prichina" class="d-block">
                                        <div class="input-title">Описание на причините за НЛР</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'opisanie_prichina') : '' ?></span>
                                        <input id="opisanie_prichina" type="text" class="form-control form-control-user" name="opisanie_prichina" value="<?= esc($pacient['opisanie_prichina']); ?>" >
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="nlr_dokladvan" class="d-block">
                                        <div class="input-title">НЛР докладван към Stada</div>
                                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nlr_dokladvan') : '' ?></span>
                                        <textarea name="nlr_dokladvan" class="textarea form-control form-control-user" id=nlr_dokladvan" cols="30" rows="10">
                                    <?= $pacient['nlr_dokladvan'] ?>
                                </textarea>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <input type="submit" name="submit" value="Публикувай" class="btn btn-primary btn-user btn-block">
                    </div>



                </div>
            </form>
        </div>
    </div>


<?= $this->endSection(); ?>