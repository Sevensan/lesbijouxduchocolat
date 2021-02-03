<div id="vue-app" class="lobby-container">
    <!-- MENU DE LA PAGE -->
    <nav id="navbar" ref="navbar">
        <div class="row" id="navRow">
            <img class="col-sm-2 col-md-4 col-12" id="logo" src="assets/img/logo.jpg" alt="">
            <section class="menus container-container col-sm-10 col-md-8 col-12">
                <div class="row">
                    <div id="menuChocolat" class="menu content-chocolat col-12 col-sm-4" v-on:click="getContenu('chocolats'); rotationDown('menuChocolat', 'menuFormulaire', 'menuInformations')">
                        <h3>Chocolats <span></span></h3>
                        <i class="fas fa-caret-down"></i>
                    </div>
                    <div id="menuFormulaire" class="menu content-formulaire col-12 col-sm-4" v-on:click="getContenu('formulaire'); rotationDown('menuFormulaire', 'menuChocolat', 'menuInformations')">
                        <h3>Contact <span></span></h3>
                        <i class="fas fa-caret-down"></i>
                    </div>

                    <div id="menuInformations" class="menu content-informations col-12 col-sm-4" v-on:click="getContenu('informations'); rotationDown('menuInformations','menuFormulaire', 'menuChocolat')">
                        <h3>Informations <span></span></h3>
                        <i class="fas fa-caret-down"></i>
                    </div>
                </div>
            </section>
            <span id="borderNav"></span>
        </div>
    </nav>

    <!-- FIN DU MENU DE LA PAGE -->
    <!-- BACKGROUND -->
    <div id="background"></div>

    <!-- SECTION DES CHOCOLATS -->
    <h1 id="h1">Les bijoux du chocolat</h1>
    <h2 v-if="contenu == 'chocolats'">nos chocolats</h2>
    <h2 v-if="contenu == 'informations'">Informations</h2>
    <h2 v-if="contenu == 'formulaire'">Formulaire de contact</h2>
    <h5></h5>
    <div class="container-fluid">
        <section v-if="contenu == 'chocolats'">
            <div class="filtres">
                <div class="icons">
                    <ul>
                        <li class="searchBar" id="searchBar" v-on:click="searchInput('searchBar'); rotation('searchBar')">
                            <i class="fas fa-search"></i>
                            <p>Rechercher un produit</p>
                        </li>
                        <li class="searchOption" id="searchOption" v-on:click="searchInput('searchOption'); rotation('searchOption')">
                            <i class="fas fa-gem"></i>
                            <p>Catégories</p>
                        </li>
                    </ul>
                </div>
                <select class="form-control form-control-lg selectSearch" v-if="inputType == 'searchOption'" v-model="optionChoisi" name="" id="">
                    <option value="">Choisissez une catégorie</option>
                    <option v-for="categorie in categoriesOption" :value="categorie.id">{{categorie.name}}</option>
                </select>
                <div v-if="inputType == 'searchBar'" class="search">
                    <input class="form-control-lg form-control" type="search" v-model="searchKey">
                </div>
                <div class="imgCategories" v-if="!optionChoisi && !searchKey && !inputType">
                    <div class="row">
                        <div class="imgCat col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3" v-for="categorie in categories">
                            <img id="imgCat" :src="setCatImg(categorie)" :alt="categorie">
                            <p class="textImgCat">{{ categorie }}</p>
                            <span v-on:click="setOptionChoisi(categorie)" class="bgCat"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 col-md-3"></div>
                <div class="col-sm-8 col-md-6 cancel">
                    <h3 class="cancelSearch" v-if="inputType || optionChoisi" v-on:click="resetSearch()">Annuler la recherche</h3>
                </div>
                <div class="col-sm-2 col-md-3"></div>
            </div>
            <div class="row">
                <div v-if="optionChoisi.length > 0 || searchKey.length > 0" v-for="chocolat in search" class="col-sm-6 col-lg-4 card product">
                    <img class="imgChocolat card-img-top" :src="setImg(chocolat.img)" alt="">
                    <div class="card-body">
                        <h3 class="card-title">{{chocolat.name}}</h3>
                        <h4 class="card-text">{{chocolat.categorie}}</h4>
                        <p class="card-text">{{chocolat.description}}</p>
                    </div>
                    <span class="borderTop"></span>
                    <span class="borderBottom"></span>
                    <span class="borderLeft"></span>
                    <span class="borderRight"></span>
                </div>
            </div>
        </section>
        <!-- FIN DE LA SECTION DES CHOCOLATS -->


        <!-- SECTION DU FORMULAIRE -->
        <section v-if="contenu == 'formulaire'">
            <form v-if="" class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="validationTooltip01">First name</label>
                    <input type="text" class="form-control" id="validationTooltip01" value="Mark" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="validationTooltip02">Last name</label>
                    <input type="text" class="form-control" id="validationTooltip02" value="Otto" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="validationTooltip03">City</label>
                    <input type="text" class="form-control" id="validationTooltip03" required>
                    <div class="invalid-tooltip">
                        Please provide a valid city.
                    </div>
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationTooltip04">State</label>
                    <select class="custom-select" id="validationTooltip04" required>
                        <option selected disabled value="">Choose...</option>
                        <option>...</option>
                    </select>
                    <div class="invalid-tooltip">
                        Please select a valid state.
                    </div>
                    </div>
                    <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">Zip</label>
                    <input type="text" class="form-control" id="validationTooltip05" required>
                    <div class="invalid-tooltip">
                        Please provide a valid zip.
                    </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit form</button>
            </form>
        </section>
        <!-- FIN DE LA SECTION DU FORMULAIRE -->

        <!-- SECTION DES INFORMATIONS -->
        <section v-if="contenu == 'informations'">
            <div class="informations">
                <div class="horaires">
                    <ul>
                        <li>Lundi : fermé</li>
                        <li>Mardi au samedi : 9h00 - 13h00, 14h00 - 19h00</li>
                        <li>Dimanche : 9h00 - 13h30</li>
                    </ul>
                </div>
                <div class="map">
                    <ul>
                        <li>16 cours Gambetta</li>
                        <li>LEOGNAN 33850</li>
                    </ul>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2834.5524512712395!2d-0.603125484251184!3d44.728744790234195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd55207871c15dbf%3A0x62085d1f0f8497c5!2sLes%20bijoux%20du%20Chocolat!5e0!3m2!1sfr!2sfr!4v1606388774639!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="autresInfos">
                    <ul> <span class="subtitle">Options de paiement</span> 
                        <li>Espèces <span class="fas fa-coins"></span></li>
                        <li>Paiement sans contact <span class="fas fa-wifi"></span></li>
                        <li>Mastercard <span class="fas fa-cc-mastercard"></span></li>
                        <li>Visa <span class="fab fa-cc-visa"></span></li>
                        <li>Carte de débit <span class="fas fa-credit-card"></span></li>
                    </ul>
                    <ul>
                        <span class="subtitle">Services</span> 
                        <li>Accessibilité aux personnes handicapés <span class="fas fa-accessible-icon"></span></li>
                        <li>A emporter <span class="fas fa-shopping-bag"></span></li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>