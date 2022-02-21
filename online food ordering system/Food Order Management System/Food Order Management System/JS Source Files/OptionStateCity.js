//Create Object State
const citiesByState = {
    Selangor: ["Balakong",
                "Bangi",
                "Banting",
                "Batang Berjuntai",
                "Batu Arang",
                "Beranang",
                "Cyberjaya",
                "Jenjarum",
                "Kajang",
                "Klang",
                "Kuala Selangor",
                "Kuang",
                "Kundang",
                "Petaling Jaya",
                "Puchong",
                "Rawang",
                "Sabak Bernam",
                "Selayang",
                "Semenyih",
                "Serendah",
                "Seri Kembangan",
                "Shah Alam",
                "Subang",
                "Subang Jaya",
                "Sungai Besar",
                "Sungai Pelek",
                "Tanjung Karang",
                "Tanjung Sepat"
            ],
    Sabah: ["Beaufort",
            "Beluran",
            "Beverly",
            "Bongawan",
            "Inanam",
            "Keningau",
            "Kota Belud",
            "Kota Kinabalu",
            "Kota Kinabatangan",
            "Kota Marudu",
            "Kuala Penyu",
            "Kudat",
            "Kunak",
            "Lahad Datu",
            "Likas",
            "Membakut",
            "Menumbok",
            "Nabawan",
            "Pamol",
            "Papar",
            "Penampang",
            "Putatan",
            "Ranau",
            "Sandakan",
            "Semporna",
            "Sipitang",
            "Tambunan",
            "Tamparuli",
            "Tanjung Aru",
            "Tawau",
            "Tenghilan",
            "Tenom",
            "Tuaran"
            ],
    Johor:["Bakri",
            "Batu Pahat",
            "Buloh Kasap",
            "Chaah",
            "Johor Bahru",
            "Kampong Dungun",
            "Kelapa Sawit",
            "Kluang",
            "Kota Tinggi",
            "Kulai",
            "Labis",
            "Mersing",
            "Muar",
            "Parit Raja",
            "Pasir Gudang Baru",
            "Pekan Nenas",
            "Pontian Kechil",
            "Segamat",
            "Sekudai",
            "Simpang Renggam",
            "Taman Senai",
            "Tangkak",
            "Ulu Tiram",
            "Yong Peng"
            ],
    Sarawak:["Asajaya",
            "Balingian",
            "Baram",
            "Bau",
            "Bekenu",
            "Belaga",
            "Belawai",
            "Betong",
            "Bintangor",
            "Bintulu",
            "Dalat",
            "Daro",
            "Debak",
            "Engkilili",
            "Julau",
            "Kabong",
            "Kanowit",
            "Kapit",
            "Kota Samarahan",
            "Kuching",
            "Lawas",
            "Limbang",
            "Lingga",
            "Long Lama",
            "Lubok Antu",
            "Lundu",
            "Lutong",
            "Matu",
            "Miri",
            "Mukah",
            "Nanga Medamit",
            "Niah",
            "Pusa",
            "Roban",
            "Saratok",
            "Sarikei",
            "Sebauh",
            "Sebuyau",
            "Serian",
            "Sibu",
            "Siburan",
            "Simunjan",
            "Song",
            "Spaoh",
            "Sri Aman",
            "Sundar",
            "Tatau",
            ],
    Perak:["Bagan Serai", 
            "Batu Gajah", 
            "Bidor", 
            "Ipoh", 
            "Kampar", 
            "Kuala Kangsar", 
            "Lumut", 
            "Pantai Remis", 
            "Parit Buntar", 
            "Simpang Empat", 
            "Sitiawan", 
            "Taiping", 
            "Tapah Road", 
            "Teluk Intan"
            ],
    Kedah:["Alor Setar", 
            "Ayer Hitam", 
            "Baling", 
            "Bandar Baharu", 
            "Bedong", 
            "Bukit Kayu Hitam", 
            "Changloon", 
            "Gurun", 
            "Jeniang", 
            "Kitra", 
            "Karangan", 
            "Kepala Batas", 
            "Kodiang", 
            "Kota Kuala Muda", 
            "Kota Sarang Semut", 
            "Kuala Kedah", 
            "Kuala Ketil", 
            "Kuala Nerang", 
            "Kuala Pegang", 
            "Kulim", 
            "Kupang", 
            "Langgar", 
            "Langkawi", 
            "Lunas", 
            "Merbok", 
            "Padang Serai", 
            "Pendang", 
            "Pokok Sena", 
            "Serdang", 
            "Sik", 
            "Simpang Empat", 
            "Sungai Petani", 
            "Universiti Utara Malaysia", 
            "Yan"
            ],
    Kelantan:["Ayer Lanas",
            "Bachok",
            "Cherang Ruku",
            "Dabong",
            "Gua Musang",
            "Jeli",
            "Kem Desa Pahlawan",
            "Ketereh",
            "Kota Bharu",
            "Kuala Balah",
            "Kuala Krai",
            "Machang",
            "Melor",
            "Pasir Mas",
            "Pasir Puteh",
            "Pulai Chondong",
            "Rantau Panjang",
            "Selising",
            "Tanah Merah",
            "Temangan",
            "Tumpat",
            "Wakaf Bharu"
            ],
    Pulau_Pinang:["Bayan Lepas",
                "Bukit Mertajam",
                "Butterworth",
                "George Town",
                "Juru",
                "Kepala Batas",
                "Nibong Tebal",
                "Perai",
                "Permatang Kuching",
                "Sungai Ara",
                "Tanjung Tokong",
                "Tasek Glugor"
                ],
    WP_Kuala_Lumpur:["Chow Kit",
                    "Fortune Park Kepong",
                    "Golden Triangle",
                    "Istana Negara",
                    "Kampong Baharu",
                    "Kampong Bandar Dalam",
                    "Kampong Bangkong",
                    "Kampong Bohol",
                    "Kampong Bukit Lanjan",
                    "Kampong Bukit Mati",
                    "Kampong Chempedak",
                    "Kampong Datok Keramat",
                    "Kampong Dollah",
                    "Kampong Haji Abdullah Hukum",
                    "Kampong Keramat Dalam",
                    "Kampong Kuchai",
                    "Kampong Lee Rubber",
                    "Kampong Pandan Dalam",
                    "Kampong Pandan Quarters",
                    "Kampong Pantai",
                    "Kampong Pasir",
                    "Kampong Pelimbaian",
                    "Kampong Petaling Bahagia",
                    "Kampong Puah",
                    "Kampong Puah Seberang",
                    "Kampong Segambut",
                    "Kampong Segambut Dalam",
                    "Kampong Semerah Padi",
                    "Kampong Seri Medan",
                    "Kampong Sungai Merali",
                    "Kampong Sungai Mulia",
                    "Kampong Sungai Penchala",
                    "Kampong Tanah Jawa",
                    "Kuala Lumpur",
                    "Kuala Lumpur Village",
                    "Lake Gardens",
                    "Pantai Valley",
                    "Petaling",
                    "Petaling Lama",
                    "Pudu","Pudu Ulu",
                    "Salak Selatan",
                    "Salak South New Village",
                    "Sentul","Seputeh",
                    "Setapak Jaya",
                    "Sungai Besi",
                    "Taman Kok Lian",
                    "Taman Maluri"
                    ],
    Pahang:["Balok",
            "Bandar Bera",
            "Bandar Pusat Jengka",
            "Bandar Tun Abdul Razak",
            "Benta",
            "Bentong",
            "Brinchang",
            "Bukit Fraser",
            "Bukit Goh",
            "Bukit Kuin",
            "Chenor",
            "Chini",
            "Damak",
            "Dong",
            "Gambang",
            "Genting Highlands",
            "Jerantut",
            "Karak",
            "Kemayan",
            "Kuala Krau",
            "Kuala Lipis",
            "Kuala Rompin",
            "Kuantan",
            "Lanchang",
            "Lurah Bilut",
            "Maran",
            "Mentakab",
            "Muadzam Shah",
            "Padang Tengku",
            "Pekan",
            "Raub",
            "Ringlet",
            "Sega",
            "Sungai Koyan",
            "Sungai Lembing",
            "Tanah Rata",
            "Temerloh",
            "Triang"
            ],
    Terengganu:["Ajil",
                "Al Muktatfi Billah Shah",
                "Ayer Puteh",
                "Bukit Besi",
                "Bukit Payong",
                "Ceneh",
                "Chalok",
                "Cukai",
                "Dungun",
                "Jerteh",
                "Kampung Raja",
                "Kemasek",
                "Kerteh",
                "Ketengah Jaya",
                "Kijal",
                "Kuala Berang",
                "Kuala Besut",
                "Kuala Terengganu",
                "Marang",
                "Paka",
                "Permaisuri",
                "Sungai Tong"
                ],
    Negeri_Sembilan:["Bahau",
                    "Bandar Enstek",
                    "Bandar Seri Jempol",
                    "Batu Kikir",
                    "Gemas",
                    "Gemencheh",
                    "Johol",
                    "Kota",
                    "Kuala Klawang",
                    "Kuala Pilah",
                    "Labu",
                    "Linggi",
                    "Mantin",
                    "Niai",
                    "Nilai",
                    "Port Dickson",
                    "Pusat Bandar Palong",
                    "Rantau",
                    "Rembau",
                    "Rompin",
                    "Seremban",
                    "Si Rusa",
                    "Simpang Durian",
                    "Simpang Pertang",
                    "Tampin",
                    "Tanjong Ipoh"
                    ],
    Melaka:["Alor Gajah",
            "Asahan",
            "Ayer Keroh",
            "Bemban",
            "Durian Tunggal",
            "Jasin",
            "Kem Trendak",
            "Kuala Sungai Baru",
            "Lubok China",
            "Masjid Tanah",
            "Melaka",
            "Merlimau",
            "Selandar",
            "Sungai Rambai",
            "Sungai Udang",
            "Tanjong Kling"
            ],
    Perlis:["Arau",
            "Kaki Bukit",
            "Kangar",
            "Kuala Perlis",
            "Padang Besar",
            "Simpang Ampat"
            ],
    WP_Putrajaya:["Putrajaya"],
    WP_Labuan:["Labuan"]
}

//Create function makeSubmenu with params value
//Assign the Object State into city option
function makeSubmenu(value) {
    if(value.length==0) document.getElementById("city").innerHTML = "<option></option>"
    else {
        //Declare citiesOptions as String
        let citiesOptions = "" //Empty String
        //Looping Object State with params value and declare as cityId
        for(cityId in citiesByState[value]) {
            //Accumulated Object State attributes into citiesOption
            citiesOptions += "<option>" + citiesByState[value][cityId] + "</option>"
        }
        //Show the looping result into city's Select form
        document.getElementById("city").innerHTML = citiesOptions
    }
}

//Use to testing whether success or not
function displaySelected() { 
    //Get the value of state and city
    let country = document.getElementById("state").value
    let city = document.getElementById("city").value
    //Output result
    console.log(country+"\n"+city)
}

//Put the looping result from city's Select form
function resetSelection() {
    document.getElementById("state").selectedIndex = 0
    document.getElementById("city").selectedIndex = 0
}
