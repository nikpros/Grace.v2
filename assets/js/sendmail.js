
jQuery(function($){
    $(document).ready(function() {
        $('#send').on("click", function(e) {
            e.preventDefault();
            
            var name = $('[name="contactName"]').val();
            var surname = $('[name="contactSurname"]').val();
            var age = $('[name="contactAge"]').val();
            // var phone = $('input[type="contactPhone"]').val()
            var email = $('[name="contactEmail"]').val()

            // триггеры для выполнения Ajax
            var trig_name = false;
            var trig_surname = false;
            var trig_age = false;
            // var trig_phone = false;
            var trig_email = false;

            //регулярка для почты
            var regEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var validEmail = regEx.test(email);
            //регулярка для имени
            var regName = /^[а-яА-Я]/;
            var validName = regName.test(name);
            console.log(validName);
            //регулярка для фамилии
            var regSurname = /^[а-яА-Я]/;
            var validSurname = regSurname.test(surname);

            //проверка на мат
            var cenz = ["бля","блядь","6лять","b3ъeб","cock","cunt","e6aль","ebal","eblan","eбaл","eбaть","eбyч","eбать","eбёт","eблантий","fuck","fucker","fucking","xyёв","xyй","xyя","xуе","xуй","xую","zaeb","zaebal","zaebali","zaebat","архипиздрит","ахуел","ахуеть","бздение","бздеть","бздех","бздецы","бздит","бздицы","бздло","бзднуть","бздун","бздунья","бздюха","бздюшка","бздюшко","бля","блябу","блябуду","бляд","бляди","блядина","блядище","блядки","блядовать","блядство","блядун","блядуны","блядунья","блядь","блядюга","блять","вафел","вафлёр","взъебка","взьебка","взьебывать","въеб","въебался","въебенн","въебусь","въебывать","выблядок","выблядыш","выеб","выебать","выебен","выебнулся","выебон","выебываться","выпердеть","высраться","выссаться","вьебен","гавно","гавнюк","гавнючка","гамно","гандон","гнид","гнида","гниды","говенка","говенный","говешка","говназия","говнецо","говнище","говно","говноед","говнолинк","говночист","говнюк","говнюха","говнядина","говняк","говняный","говнять","гондон","доебываться","долбоеб","долбоёб","долбоящер","дрисня","дрист","дристануть","дристать","дристун","дристуха","дрочелло","дрочена","дрочила","дрочилка","дрочистый","дрочить","дрочка","дрочун","е6ал","е6ут","еб твою мать","ёб твою мать","ёбaн","ебaть","ебyч","ебал","ебало","ебальник","ебан","ебанамать","ебанат","ебаная","ёбаная","ебанический","ебанный","ебанныйврот","ебаное","ебануть","ебануться","ёбаную","ебаный","ебанько","ебарь","ебат","ёбат","ебатория","ебать","ебать-копать","ебаться","ебашить","ебёна","ебет","ебёт","ебец","ебик","ебин","ебись","ебическая","ебки","ебла","еблан","ебливый","еблище","ебло","еблыст","ебля","ёбн","ебнуть","ебнуться","ебня","ебошить","ебская","ебский","ебтвоюмать","ебун","ебут","ебуч","ебуче","ебучее","ебучий","ебучим","ебущ","ебырь","елда","елдак","елдачить","жопа","жопу","заговнять","задрачивать","задристать","задрота","зае6","заё6","заеб","заёб","заеба","заебал","заебанец","заебастая","заебастый","заебать","заебаться","заебашить","заебистое","заёбистое","заебистые","заёбистые","заебистый","заёбистый","заебись","заебошить","заебываться","залуп","залупа","залупаться","залупить","залупиться","замудохаться","запиздячить","засерать","засерун","засеря","засирать","засрун","захуячить","заябестая","злоеб","злоебучая","злоебучее","злоебучий","ибанамат","ибонех","изговнять","изговняться","изъебнуться","ипать","ипаться","ипаццо","Какдвапальцаобоссать","конча","курва","курвятник","лох","лошарa","лошара","лошары","лошок","лярва","малафья","манда","мандавошек","мандавошка","мандавошки","мандей","мандень","мандеть","мандища","мандой","манду","мандюк","минет","минетчик","минетчица","млять","мокрощелка","мокрощёлка","мразь","мудak","мудaк","мудаг","мудак","муде","мудель","мудеть","муди","мудил","мудила","мудистый","мудня","мудоеб","мудозвон","мудоклюй","нахер","нахуй","набздел","набздеть","наговнять","надристать","надрочить","наебать","наебет","наебнуть","наебнуться","наебывать","напиздел","напиздели","напиздело","напиздили","насрать","настопиздить","нахер","нахрен","нахуй","нахуйник","не ебет","не ебёт","невротебучий","невъебенно","нехира","нехрен","Нехуй","нехуйственно","ниибацо","ниипацца","ниипаццо","ниипет","никуя","нихера","нихуя","обдристаться","обосранец","обосрать","обосцать","обосцаться","обсирать","объебос","обьебать","обьебос","однохуйственно","опездал","опизде","опизденивающе","остоебенить","остопиздеть","отмудохать","отпиздить","отпиздячить","отпороть","отъебись","охуевательский","охуевать","охуевающий","охуел","охуенно","охуеньчик","охуеть","охуительно","охуительный","охуяньчик","охуячивать","охуячить","очкун","падла","падонки","падонок","паскуда","педерас","педик","педрик","педрила","педрилло","педрило","педрилы","пездень","пездит","пездишь","пездо","пездят","пердануть","пердеж","пердение","пердеть","пердильник","перднуть","пёрднуть","пердун","пердунец","пердунина","пердунья","пердуха","пердь","переёбок","пернуть","пёрнуть","пи3д","пи3де","пи3ду","пиzдец","пидар","пидарaс","пидарас","пидарасы","пидары","пидор","пидорасы","пидорка","пидорок","пидоры","пидрас","пизда","пиздануть","пиздануться","пиздарваньчик","пиздато","пиздатое","пиздатый","пизденка","пизденыш","пиздёныш","пиздеть","пиздец","пиздит","пиздить","пиздиться","пиздишь","пиздища","пиздище","пиздобол","пиздоболы","пиздобратия","пиздоватая","пиздоватый","пиздолиз","пиздонутые","пиздорванец","пиздорванка","пиздострадатель","пизду","пиздуй","пиздун","пиздунья","пизды","пиздюга","пиздюк","пиздюлина","пиздюля","пиздят","пиздячить","писбшки","писька","писькострадатель","писюн","писюшка","похуй","похую","подговнять","подонки","подонок","подъебнуть","подъебнуться","поебать","поебень","поёбываает","поскуда","посрать","потаскуха","потаскушка","похер","похерил","похерила","похерили","похеру","похрен","похрену","похуй","похуист","похуистка","похую","придурок","приебаться","припиздень","припизднутый","припиздюлина","пробзделся","проблядь","проеб","проебанка","проебать","промандеть","промудеть","пропизделся","пропиздеть","пропиздячить","раздолбай","разхуячить","разъеб","разъеба","разъебай","разъебать","распиздай","распиздеться","распиздяй","распиздяйство","распроеть","сволота","сволочь","сговнять","секель","серун","серька","сестроеб","сикель","сила","сирать","сирывать","соси","спиздел","спиздеть","спиздил","спиздила","спиздили","спиздит","спиздить","срака","сраку","сраный","сранье","срать","срун","ссака","ссышь","стерва","страхопиздище","сука","суки","суходрочка","сучара","сучий","сучка","сучко","сучонок","сучье","сцание","сцать","сцука","сцуки","сцуконах","сцуль","сцыха","сцышь","съебаться","сыкун","трахае6","трахаеб","трахаёб","трахатель","ублюдок","уебать","уёбища","уебище","уёбище","уебищное","уёбищное","уебк","уебки","уёбки","уебок","уёбок","урюк","усраться","ушлепок","х_у_я_р_а","хyё","хyй","хyйня","хамло","хер","херня","херовато","херовина","херовый","хитровыебанный","хитрожопый","хуeм","хуе","хуё","хуевато","хуёвенький","хуевина","хуево","хуевый","хуёвый","хуек","хуёк","хуел","хуем","хуенч","хуеныш","хуенький","хуеплет","хуеплёт","хуепромышленник","хуерик","хуерыло","хуесос","хуесоска","хуета","хуетень","хуею","хуи","хуй","хуйком","хуйло","хуйня","хуйрик","хуище","хуля","хую","хуюл","хуя","хуяк","хуякать","хуякнуть","хуяра","хуясе","хуячить","целка","чмо","чмошник","чмырь","шалава","шалавой","шараёбиться","шлюха","шлюхой","шлюшка","ябывает"];
            var validCenzName = true;
            var validCenzSurname = true;
            for (var i = 0; i < cenz.length; i++) {
                if (cenz[i] == name.toLowerCase()) {
                    validCenzName = false;
                    break;
                }
            }
            for (var i = 0; i < cenz.length; i++) {
                if (cenz[i] == surname.toLowerCase()) {
                    validCenzSurname = false;
                    break;
                }
            }
            
            // валидация поля Имя
            if (name && !(name.indexOf(" ") + 1) && validName && validCenzName) trig_name = true;
            else $('[name="contactName"]').css('border-color', '#AF2B2B');

            // валидация поля Фамилия
            if (surname && !(surname.indexOf(" ") + 1) && validSurname && validCenzSurname) trig_surname = true;
            else $('[name="contactSurname"]').css('border-color', '#AF2B2B');

            // валидация поля Возраст
            if (age && (age > 3 && age < 160))  trig_age = true;
            else $('[name="contactAge"]').css('border-color', '#AF2B2B');

            // валидация поля Телефон
            // if (phone != undefined && phone) trig_phone = true;
            // else $('[name="contactPhone"]').css('border-color', '#AF2B2B');

            // валидация поля Почта
            console.log(email);
            if (email != undefined && email && validEmail) trig_email = true;
            else $('[name="contactEmail"]').css('border-color', '#AF2B2B');

            // проверка всех тригерров
            console.log(trig_name, trig_surname, trig_age, trig_email, Cookies.get('flag'));
            if ((trig_name && trig_surname && trig_age && trig_email) && Cookies.get('flag') == 'false') {
                Cookies.set('flag', true);
                sendAjaxForm(name, surname, age, email);
            } else {
            if ((trig_name && trig_surname && trig_age && trig_email) && Cookies.get('flag') == 'true') {
                $('#Request').modal('show');
            }
        }
        });
    });

    function sendAjaxForm(name, surname, age, mail) {
        var data = {
            'action': 'sendmail',
            'name': name,
            'surname': surname,
            'age': age,
            'mail': mail
        };

        $.ajax({
            url: ajaxurl, // обработчик
            data: data, // данные
            type: 'POST', // тип запроса
            success: function() {
                console.log('MAIL SEND SUCCESS!!!');
            },
            error: function(jqXHR) {
                console.log('MAIL NOT SEND ERROR!!! - ', jqXHR);
            }
        })
    }
})