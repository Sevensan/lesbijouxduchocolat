const vue = new Vue({
    data: ()=>{
        return {
            chocolats : [],
            categories: [],
            categoriesOption: [],
            optionChoisi:"",
            searchKey:"",
            inputType:"",
            test:'',
            contenu:"",
            hauteurNav:0,
        }
    },
    computed:{
        search(){
            //on retourne un tableau d'objets qui comprennent un des éléments suivants : l'option choisi, ou un mot compris dans le titre ou dans la description du produit
            return this.chocolats.filter((param)=>{
                console.log(param.categorie.includes(this.optionChoisi));
                return param.categorie.includes(this.optionChoisi) &&
                (param.name.toLowerCase().includes(this.searchKey.toLowerCase()) || param.description.toLowerCase().includes(this.searchKey.toLowerCase()));
            });
        },
    },
    methods:{
        setOptionChoisi(option){
            this.optionChoisi = option;
        },
        setImg(url){
            return "assets/img/" + url;
        },
        setCatImg(url){
            return "assets/img/" + url + ".jpg";
        },
        searchInput(untruc){
            this.inputType = untruc;
        },
        resetSearch(){
            this.inputType = "";
            this.searchKey = "";
            this.optionChoisi = "";
        },
        rotation(id){
            let element = document.getElementById(id);
            element.classList.add("rotation");
        },
        rotationDown(id1, id2, id3){
            let element1 = document.getElementById(id1);
            let element2 = document.getElementById(id2);
            let element3 = document.getElementById(id3);
            if(!element1.classList.contains("rotation-down")){
                element1.classList.add("rotation-down");
                element2.classList.remove("rotation-down");
                element3.classList.remove("rotation-down");
            }
            else{
                element1.classList.remove("rotation-down");
                this.contenu = "";
            }
 
        },
        getContenu(contenu){
            this.contenu = contenu;
        },
        // getHeightNav(){
        //     this.hauteurNav = this.$refs.navbar.clientHeight + "px";
        // }
    },
    mounted(){
        axios.get("libraries/controllers/getData.php").then((res)=>{
        return res.data;
        })
        .then((res)=>{
            console.log(res);
            return this.chocolats = res;
        }).then(()=>{
            for(let i = 0; i<this.chocolats.length; i++){
                if(!this.categories.includes(this.chocolats[i].categorie)){
                    this.categories.push(this.chocolats[i].categorie
                    );
                }
            }
        });
        // this.getHeightNav();
        setTimeout(()=>{
            let arr = this.categories.sort();
            for(let i = 0; i<arr.length; i++){
                this.categoriesOption.push({
                    name:arr[i],
                    id: arr[i],
                });
            }
        }, 500);
    },
}).$mount("#vue-app");