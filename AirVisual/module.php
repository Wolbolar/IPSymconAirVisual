<?php
declare(strict_types=1);

require_once __DIR__ . '/../bootstrap.php';
require_once __DIR__ . '/../libs/ProfileHelper.php';
require_once __DIR__ . '/../libs/ConstHelper.php';

// module for AirVisual

class AirVisual extends IPSModule
{
    use ProfileHelper;

    // helper properties
    private $position = 0;

    public function Create()
    {
        //Never delete this line!
        parent::Create();

        //These lines are parsed on Symcon Startup or Instance creation
        //You cannot use variables here. Just static values.

        $this->RegisterPropertyInteger('country', 24);
        $this->RegisterAttributeString(
            'available_countries',
            '["Afghanistan","Andorra","Argentina","Australia","Austria","Bahamas","Bahrain","Bangladesh","Belgium","Bosnia Herzegovina","Brazil","Cambodia","Canada","Chile","China","Colombia","Croatia","Cyprus","Czech Republic","Denmark","Estonia","Ethiopia","Finland","France","Germany","Hong Kong","Hungary","India","Indonesia","Iran","Ireland","Israel","Italy","Japan","Kosovo","Kuwait","Latvia","Lithuania","Macedonia","Malaysia","Malta","Mexico","Mongolia","Morocco","Nepal","Netherlands","New Zealand","Nigeria","Norway","Pakistan","Peru","Philippines","Poland","Portugal","Puerto Rico","Russia","Saudi Arabia","Serbia","Singapore","Slovakia","Slovenia","South Korea","Spain","Sri Lanka","Sweden","Switzerland","Taiwan","Thailand","Turkey","USA","Uganda","Ukraine","United Arab Emirates","United Kingdom","Vietnam"]'
        );
        $this->RegisterPropertyInteger('state', -1);
        $this->RegisterAttributeString('available_states', '');
        $this->RegisterPropertyString(
            'states_germany',
            '["Baden-Wuerttemberg","Bavaria","Berlin","Brandenburg", "Bremen", "Hamburg","Hessen","Lower Saxony","Mecklenburg-Vorpommern","Nordrhein-Westfalen","Rheinland-Pfalz","Saarland","Saxony","Saxony-Anhalt","Schleswig-Holstein","Thuringia"]'
        );
        $this->RegisterPropertyString(
            'states_austria', '["Burgenland","Lower Austria","Salzburg","Styria","Tyrol","Upper Austria","Vienna","Vorarlberg"]'
        );
        $this->RegisterPropertyString(
            'states_switzerland',
            '["Basel-Landschaft","Bern","Grisons","Lucerne","Neuchatel","Schwyz","Solothurn","Thurgau","Ticino","Valais","Vaud","Zurich"]'
        );
        $this->RegisterPropertyString('states_uk', '["England","Northern Ireland","Scotland","Wales"]');
        $this->RegisterPropertyString(
            'states_usa',
            '["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","Washington, D.C.","West Virginia","Wisconsin","Wyoming"]'
        );
        $this->RegisterPropertyString(
            'states_china',
            '["Anhui","Beijing","Chongqing","Fujian","Gansu","Guangdong","Guangxi","Guizhou","Hainan","Hebei","Heilongjiang","Henan","Hubei","Hunan","Inner Mongolia","Jiangsu","Jiangxi","Jilin","Liaoning","Ningxia","Qinghai","Shaanxi","Shandong","Shanghai","Shanxi","Sichuan","Tianjin","Tibet","Xinjiang","Yunnan","Zhejiang"]'
        );
        $this->RegisterPropertyString(
            'states_france',
            '["Auvergne-Rhone-Alpes","Bourgogne-Franche-Comte","Brittany","Centre","Corsica","Grand Est","Hauts-de-France","Ile-de-France","Normandy","Nouvelle-Aquitaine","Occitanie","Pays de la Loire","Provence-Alpes-Cote d\'Azur"]'
        );
        $this->RegisterPropertyString('states_belgium', '["Brussels Capital","Flanders","Wallonia"]');
        $this->RegisterPropertyString(
            'states_canada',
            '["Alberta","British Columbia","Manitoba","New Brunswick","Newfoundland and Labrador","Northwest Territories","Nova Scotia","Ontario","Prince Edward Island","Quebec","Saskatchewan"]'
        );
        $this->RegisterPropertyString('states_denmark', '["Capital Region","Central Denmark","Southern Denmark","Zealand"]');
        $this->RegisterPropertyString(
            'states_india',
            '["Andhra Pradesh","Bihar","Delhi","Gujarat","Haryana","Jharkhand","Karnataka","Maharashtra","Punjab","Rajasthan","Tamil Nadu","Telangana","Uttar Pradesh","West Bengal"]'
        );
        $this->RegisterPropertyString('states_italy', '["Abruzzo","Emilia-Romagna","Lombardy","Piedmont","Trentino-Alto Adige","Veneto"]');
        $this->RegisterPropertyString(
            'states_japan',
            '["Aichi","Akita","Aomori","Chiba","Ehime","Fukui","Fukuoka","Fukushima","Gifu","Gunma","Hiroshima","Hokkaido","Hyogo","Ibaraki","Ishikawa","Iwate","Kagawa","Kagoshima","Kanagawa","Kochi","Kumamoto","Kyoto","Mie","Miyagi","Miyazaki","Nagano","Nagasaki","Nara","Niigata","Oita","Okayama","Okinawa","Osaka","Saga","Saitama","Shiga","Shimane","Shizuoka","Tochigi","Tokushima","Tokyo","Tottori","Toyama","Wakayama","Yamagata","Yamaguchi","Yamanashi"]'
        );
        $this->RegisterPropertyString(
            'states_netherlands',
            '["Drenthe","Flevoland","Gelderland","Groningen","Limburg","North Brabant","North Holland","Overijssel","South Holland","Utrecht","Zeeland"]'
        );
        $this->RegisterPropertyString(
            'states_poland',
            '["Greater Poland","Kujawsko-Pomorskie","Lesser Poland Voivodeship","Lodz Voivodeship","Lower Silesia","Lublin","Lubusz","Mazovia","Opole Voivodeship","Podlasie","Pomerania","Silesia","Subcarpathian Voivodeship","Swietokrzyskie","Warmia-Masuria","West Pomerania"]'
        );
        $this->RegisterPropertyString(
            'states_spain',
            '["Andalusia","Aragon","Asturias","Balearic Islands","Basque Country","Cantabria","Castille and Leon","Castille-La Mancha","Catalonia","Extremadura","Galicia","La Rioja","Madrid","Murcia","Navarre","Valencia"]'
        );
        $this->RegisterPropertyInteger('city', -1);
        $this->RegisterAttributeString('available_cities', '');
        $this->RegisterPropertyString('api_key', '');
        $this->RegisterPropertyInteger('UpdateInterval', 60);
        $this->RegisterTimer('AirVisualDataUpdate', 0, 'AirVisual_DataUpdate(' . $this->InstanceID . ');');
        $this->RegisterVariableString('airvisual_earth_3d', $this->Translate('AirVisual Earth'), '~HTMLBox', $this->_getPosition());

        //we will wait until the kernel is ready
        $this->RegisterMessage(0, IPS_KERNELMESSAGE);
    }

    public function ApplyChanges()
    {
        //Never delete this line!
        parent::ApplyChanges();

        if (IPS_GetKernelRunlevel() !== KR_READY) {
            return;
        }

        $this->ValidateConfiguration();
    }

    /**
     * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
     * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:.
     */
    private function ValidateConfiguration()
    {
        $api_key = $this->ReadPropertyString('api_key');

        // api key
        if ($api_key == '') {
            $this->SetStatus(205); // field must not be empty
        } else {
            $this->RegisterVariableString('location', $this->Translate('Location'), '', $this->_getPosition());
            $associations = [
                [0, $this->Translate('Good %d'), '', 0x74DF00], // 0 - 50 green
                [51, $this->Translate('Moderate %d'), '', 0xF7FE2E], // 51 - 100 yellow
                [101, $this->Translate('Unhealthy for Sensitive Groups %d'), '', 0xFF8000], // 101 - 150 orange
                [151, $this->Translate('Unhealthy %d'), '', 0xFF0000], // 151 - 200 red
                [201, $this->Translate('Very Unhealthy %d'), '', 0x8A0886], // 201 - 300 purple
                [301, $this->Translate('Hazardous %d'), '', 0x3B0B17] // 301 - 500 maroon
            ];
            $this->RegisterProfileAssociation('AirVisual.aqius', 'Factory', '', '', 0, 500, 0, 0, vtFloat, $associations);
            $this->RegisterVariableFloat('aqius', $this->Translate('AQI US'), 'AirVisual.aqius', $this->_getPosition());
            $this->RegisterProfileAssociation('AirVisual.mainus', 'Factory', '', '', 0, 500, 0, 0, vtFloat, $associations);
            //$this->RegisterVariableFloat("mainus", $this->Translate("Main US"), "AirVisual.mainus", 4);
            $this->RegisterProfileAssociation('AirVisual.aqicn', 'Factory', '', '', 0, 500, 0, 0, vtFloat, $associations);
            //$this->RegisterVariableFloat("aqicn", $this->Translate("AQI China"), "AirVisual.aqicn", 5);
            $this->RegisterProfileAssociation('AirVisual.maincn', 'Factory', '', '', 0, 500, 0, 0, vtFloat, $associations);
            //$this->RegisterVariableFloat("maincn", $this->Translate("Main China"), "AirVisual.maincn", 6);

            $this->RegisterVariableFloat('humidity', $this->Translate('Humidity'), '~Humidity.F', $this->_getPosition());
            $this->RegisterProfileAssociation('AirVisual.ic', 'Moon', '', '', 0, 500, 0, 0, vtFloat, $associations);
            $this->RegisterVariableString('ic', $this->Translate('ic'), '', $this->_getPosition());
            $this->RegisterVariableFloat('pressure', $this->Translate('Pressure'), '~AirPressure.F', $this->_getPosition());
            $this->RegisterVariableFloat('temperature', $this->Translate('Temperature'), '~Temperature', $this->_getPosition());
            $this->RegisterVariableFloat('winddirection', $this->Translate('Wind Direction'), '~WindDirection.F', $this->_getPosition());
            $this->RegisterVariableFloat('windspeed', $this->Translate('Wind Speed'), '~WindSpeed.kmh', $this->_getPosition());
            $this->SetVisualEarth();
            $this->SetUpdateIntervall();
            // Status Aktiv
            $this->SetStatus(IS_ACTIVE);
        }
    }

    public function MessageSink($TimeStamp, $SenderID, $Message, $Data)
    {

        switch ($Message) {
            case IM_CHANGESTATUS:
                if ($Data[0] === IS_ACTIVE) {
                    $this->ApplyChanges();
                }
                break;

            case IPS_KERNELMESSAGE:
                if ($Data[0] === KR_READY) {
                    $this->ApplyChanges();
                }
                break;

            default:
                break;
        }
    }

    /**
     * Set Timer Intervall.
     */
    protected function SetUpdateIntervall()
    {
        $interval = ($this->ReadPropertyInteger('UpdateInterval')) * 1000; // interval seconds
        $this->SendDebug('AirVisual', 'Set update interval to ' . $interval . ' seconds', 0);
        $this->SetTimerInterval('AirVisualDataUpdate', $interval);
    }

    /**
     * Update Data.
     */
    public function DataUpdate()
    {
        $city_value    = $this->ReadPropertyInteger('city');
        $city          = $this->CitiesList($city_value);
        $state_value   = $this->ReadPropertyInteger('state');
        $state         = $this->StatesList($state_value);
        $country_value = $this->ReadPropertyInteger('country');
        $country       = $this->CountriesList($country_value);
        $this->SendDebug('AirVisual Request', 'Get data for location :' . $city . ' (' . $state . '/' . $country . ')', 0);
        if ($city != '') {
            $data = $this->GetCityData($city, $state, $country);
        } else {
            $data_city = $this->GetNearestCityData();
            $data      = json_decode($data_city);
            $status    = $data->status;
            if ($status == 'success') {
                $this->SendDebug('AirVisual', 'Get nearest city data successfull', 0);
                $this->WriteCityData($data);
            }
        }
        return $data;
    }

    /**
     * Get list of countries for selection form.
     */
    public function GetSelectionCountries()
    {
        $available_countries = $this->ReadAttributeString('available_countries');
        if ($available_countries == '') {
            $this->SendDebug('AirVisual', 'no countries, get countries from AirVisual', 0);
            $payload = $this->ListSupportedCountries();
            $list    = json_decode($payload, true);
            $status  = $list['status'];
            if ($status == 'success') {
                $available_countries = $list['data'];
                $countries           = [];
                foreach ($available_countries as $key => $country) {
                    $countries[] = $country['country'];
                }
                $this->WriteAttributeString('available_countries', json_encode($countries));
                return $countries;
            } else {
                $this->SendDebug('AirVisual', 'could not get countries list', 0);
                return false;
            }
        } else {
            $countries = json_decode($available_countries, true);
            return $countries;
        }
    }

    /**
     * Get list of states for selection form.
     *
     * @return array|bool
     */
    protected function GetSelectionStates()
    {
        $country_value = $this->GetCountriesValue();
        $country       = $this->CountriesList($country_value);
        if ($country_value == -1) {
            $this->SetStatus(201);
            $this->SendDebug('AirVisual', 'no country selected', 0);
            return false;
        } elseif ($country_value == 24 && $country == 'Germany') {
            $available_states = $this->ReadPropertyString('states_germany');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 4 && $country == 'Austria') {
            $available_states = $this->ReadPropertyString('states_austria');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 65 && $country == 'Switzerland') {
            $available_states = $this->ReadPropertyString('states_switzerland');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 73 && $country == 'United Kingdom') {
            $available_states = $this->ReadPropertyString('states_uk');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 70 && $country == 'USA') {
            $available_states = $this->ReadPropertyString('states_usa');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 14 && $country == 'China') {
            $available_states = $this->ReadPropertyString('states_china');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 23 && $country == 'France') {
            $available_states = $this->ReadPropertyString('states_france');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 8 && $country == 'Belgium') {
            $available_states = $this->ReadPropertyString('states_belgium');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 12 && $country == 'Canada') {
            $available_states = $this->ReadPropertyString('states_canada');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 19 && $country == 'Denmark') {
            $available_states = $this->ReadPropertyString('states_denmark');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 27 && $country == 'India') {
            $available_states = $this->ReadPropertyString('states_india');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 32 && $country == 'Italy') {
            $available_states = $this->ReadPropertyString('states_italy');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 33 && $country == 'Japan') {
            $available_states = $this->ReadPropertyString('states_japan');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 45 && $country == 'Netherlands') {
            $available_states = $this->ReadPropertyString('states_netherlands');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 52 && $country == 'Poland') {
            $available_states = $this->ReadPropertyString('states_poland');
            $states           = json_decode($available_states, true);
            return $states;
        } elseif ($country_value == 62 && $country == 'Spain') {
            $available_states = $this->ReadPropertyString('states_spain');
            $states           = json_decode($available_states, true);
            return $states;
        } else {
            $payload = $this->ListStates($country);
            $list    = json_decode($payload, true);
            $status  = $list['status'];
            if ($status == 'success') {
                $available_states = $list['data'];
                $states           = [];
                foreach ($available_states as $key => $state) {
                    $states[] = $state['state'];
                }
                $this->WriteAttributeString('available_states', json_encode($states));
                $this->SendDebug('AirVisual', 'states: ' . json_encode($states), 0);
                return $states;
            } else {
                $this->SendDebug('AirVisual', 'could not get states list', 0);
                return false;
            }
        }
    }

    /**
     * Get list of coties for selection form.
     *
     * @return array|bool
     */
    protected function GetSelectionCities()
    {
        $country_value = $this->GetCountriesValue();
        $state_value   = $this->GetStateValue();
        if ($country_value == -1) {
            $this->SetStatus(201);
            $this->SendDebug('AirVisual', 'no country selected', 0);
            return false;
        } elseif ($state_value == -1) {
            $this->SetStatus(202);
            $this->SendDebug('AirVisual', 'no state selected', 0);
            return false;
        } else {
            $country = $this->CountriesList($country_value);
            $state   = $this->StatesList($state_value);
            $payload = $this->ListCities($state, $country);
            $list    = json_decode($payload, true);
            $status  = $list['status'];
            if ($status == 'success') {
                $available_cities = $list['data'];
                $cities           = [];
                foreach ($available_cities as $key => $city) {
                    $cities[] = $city['city'];
                }
                $this->WriteAttributeString('available_cities', json_encode($cities));
                return $cities;
            } else {
                $this->SendDebug('AirVisual', 'could not get cities list', 0);
                return false;
            }
        }
    }

    /**
     * Get city selection.
     *
     * @return bool
     */
    protected function GetCityValue()
    {
        $city_value = $this->ReadPropertyInteger('city');
        $this->SendDebug('AirVisual', 'City selected: ' . $city_value, 0);
        return $city_value;
    }

    /**
     * Set city selection.
     *
     * @param $city_value
     */
    protected function SetCityValue($city_value)
    {
        IPS_SetProperty($this->InstanceID, 'city', $city_value);
        IPS_ApplyChanges($this->InstanceID);
    }

    /**
     * Get city for the selection.
     *
     * @param $city_value
     *
     * @return mixed
     */
    protected function CitiesList(int $city_value)
    {
        $available_cities = $this->ReadAttributeString('available_cities');
        if ($available_cities == '') {
            $this->SendDebug('AirVisual', 'no city, get cities from AirVisual', 0);
            $cities = $this->GetSelectionCities();

        } else {
            $cities = json_decode($available_cities, true);
        }

        $this->SendDebug('AirVisual', 'city selection number ' . $city_value, 0);
        $this->SendDebug('AirVisual Cities', $available_cities, 0);
        $city = $cities[$city_value];
        $this->SendDebug('AirVisual', 'city selected ' . $city, 0);
        return $city;
    }

    /**
     * Get state selection.
     *
     * @return int
     */
    protected function GetStateValue()
    {
        $states_value = $this->ReadPropertyInteger('state');
        $this->SendDebug('AirVisual', 'State selected: ' . $states_value, 0);
        return $states_value;
    }

    /**
     * Set state selection.
     *
     * @param $states_value
     */
    protected function SetStateValue($states_value)
    {
        IPS_SetProperty($this->InstanceID, 'state', $states_value);
        IPS_ApplyChanges($this->InstanceID);
    }

    /**
     * Get state for the selection.
     *
     * @param $state_value
     *
     * @return mixed
     */
    protected function StatesList(int $state_value)
    {
        $country_value    = $this->GetCountriesValue();
        $country          = $this->CountriesList($country_value);
        $available_states = $this->ReadAttributeString('available_states');
        if ($country_value == 24 && $country == 'Germany') {
            $available_states = $this->ReadPropertyString('states_germany');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 4 && $country == 'Austria') {
            $available_states = $this->ReadPropertyString('states_austria');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 65 && $country == 'Switzerland') {
            $available_states = $this->ReadPropertyString('states_switzerland');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 73 && $country == 'United Kingdom') {
            $available_states = $this->ReadPropertyString('states_uk');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 70 && $country == 'USA') {
            $available_states = $this->ReadPropertyString('states_usa');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 14 && $country == 'China') {
            $available_states = $this->ReadPropertyString('states_china');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 23 && $country == 'France') {
            $available_states = $this->ReadPropertyString('states_france');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 8 && $country == 'Belgium') {
            $available_states = $this->ReadPropertyString('states_belgium');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 12 && $country == 'Canada') {
            $available_states = $this->ReadPropertyString('states_canada');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 19 && $country == 'Denmark') {
            $available_states = $this->ReadPropertyString('states_denmark');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 27 && $country == 'India') {
            $available_states = $this->ReadPropertyString('states_india');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 32 && $country == 'Italy') {
            $available_states = $this->ReadPropertyString('states_italy');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 33 && $country == 'Japan') {
            $available_states = $this->ReadPropertyString('states_japan');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 45 && $country == 'Netherlands') {
            $available_states = $this->ReadPropertyString('states_netherlands');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 52 && $country == 'Poland') {
            $available_states = $this->ReadPropertyString('states_poland');
            $states           = json_decode($available_states, true);
        } elseif ($country_value == 62 && $country == 'Spain') {
            $available_states = $this->ReadPropertyString('states_spain');
            $states           = json_decode($available_states, true);
        } elseif ($available_states == '') {
            $this->SendDebug('AirVisual', 'no states, get states from AirVisual', 0);
            $states = $this->GetSelectionStates();
        } else {
            $states = json_decode($available_states, true);
        }
        $this->SendDebug('AirVisual', 'state selection number ' . $state_value, 0);
        $this->SendDebug('AirVisual States', $available_states, 0);
        $state = $states[$state_value];
        $this->SendDebug('AirVisual', 'state selected ' . $state, 0);
        return $state;
    }

    /** Get country selection.
     *
     * @return int
     */
    protected function GetCountriesValue()
    {
        $countries_value = $this->ReadPropertyInteger('country');
        $this->SendDebug('AirVisual', 'Country selected: ' . $countries_value, 0);
        return $countries_value;
    }

    /**
     * Set country selection.
     *
     * @param $countries_value
     */
    protected function SetCountriesValue($countries_value)
    {
        IPS_SetProperty($this->InstanceID, 'country', $countries_value);
        IPS_ApplyChanges($this->InstanceID);
    }


    /**
     * Get country for the selection.
     *
     * @param $country_value
     *
     * @return mixed
     */
    protected function CountriesList(int $country_value)
    {
        $available_countries = $this->ReadAttributeString('available_countries');
        if ($available_countries == '') {
            $this->SendDebug('AirVisual', 'no countries, get countries from AirVisual', 0);
            $countries = $this->GetSelectionCountries();
        } else {
            $countries = json_decode($available_countries, true);
        }
        $this->SendDebug('AirVisual', 'country selection number ' . $country_value, 0);
        $this->SendDebug('AirVisual Countries', $available_countries, 0);
        $country = $countries[$country_value];
        $this->SendDebug('AirVisual', 'country selected ' . $country, 0);
        return $country;
    }

    /**
     * Set Value Visual Earth 3D.
     */
    private function SetVisualEarth()
    {
        $airvisual_earth = GetValue($this->GetIDForIdent('airvisual_earth_3d'));
        if ($airvisual_earth == '') {
            $web_url = 'https://www.airvisual.com/earth'; // URL AirVisual Earth
            $height  = '450px'; // height
            $width   = '100%'; // width
            $content = '<iframe src="' . $web_url . '" style= "width: ' . $width . '; height: ' . $height . ';"/></iframe>';
            $this->SetValue('airvisual_earth_3d', $content);
        }
    }

    /**
     * List supported countries.
     *
     * @return mixed|string
     */
    public function ListSupportedCountries()
    {
        $command  = 'countries?key=';
        $response = $this->SendAirVisualAPIRequest($command);
        $this->SendDebug('AirVisual Response', $response, 0);
        return $response;
    }

    /**
     * List supported states in a country.
     *
     * @param string $country
     *
     * @return mixed|string
     */
    public function ListStates(string $country)
    {
        $country  = urlencode($country);
        $command  = 'states?country=' . $country . '&key=';
        $response = $this->SendAirVisualAPIRequest($command);
        $this->SendDebug('AirVisual Response', $response, 0);
        return $response;
    }

    /**
     * List supported cities in a state.
     *
     * @param $state
     * @param $country
     *
     * @return mixed|string
     */
    public function ListCities(string $state, string $country)
    {
        $state    = urlencode($state);
        $country  = urlencode($country);
        $command  = 'cities?state=' . $state . '&country=' . $country . '&key=';
        $response = $this->SendAirVisualAPIRequest($command);
        $this->SendDebug('AirVisual Response', $response, 0);
        return $response;
    }

    /**
     * Get nearest city data (IP geolocation).
     *
     * @return mixed|string
     */
    public function GetNearestCityData()
    {
        $command   = 'nearest_city?key=';
        $data_city = $this->SendAirVisualAPIRequest($command);
        $this->SendDebug('AirVisual Response', $data_city, 0);
        $data   = json_decode($data_city);
        $status = $data->status;
        $this->SendDebug('AirVisual Request Status', $status, 0);
        if ($status == 'success') {
            $this->SendDebug('AirVisual', 'Get city data successfull', 0);
            $this->WriteCityData($data);
        }
        return $data_city;
    }

    /**
     * Get nearest city data (GPS coordinates).
     *
     * @param float $latitude
     * @param float $longitude
     *
     * @return mixed|string
     */
    public function GetNearestCityDataGPS(float $latitude, float $longitude)
    {
        $command   = 'nearest_city?lat=' . $latitude . '&lon=' . $longitude . '&key=';
        $data_city = $this->SendAirVisualAPIRequest($command);
        $this->SendDebug('AirVisual Response', $data_city, 0);
        $data   = json_decode($data_city);
        $status = $data->status;
        $this->SendDebug('AirVisual Request Status', $status, 0);
        if ($status == 'success') {
            $this->SendDebug('AirVisual', 'Get city data successfull', 0);
            $this->WriteCityData($data);
        }
        return $data_city;
    }

    /**
     * Get specified city data.
     *
     * @param string $city
     * @param string $state
     * @param string $country
     *
     * @return mixed|string
     */
    public function GetCityData(string $city, string $state, string $country)
    {
        $state     = urlencode($state);
        $country   = urlencode($country);
        $command   = 'city?city=' . $city . '&state=' . $state . '&country=' . $country . '&key=';
        $data_city = $this->SendAirVisualAPIRequest($command);
        $this->SendDebug('AirVisual Response', $data_city, 0);
        if (empty($data_city)) {
            $this->SendDebug('AirVisual Request Status', 'no respone for this city', 0);
            return '';
        } else {
            $data   = json_decode($data_city);
            $status = $data->status;
            $this->SendDebug('AirVisual Request Status', $status, 0);
            if ($status == 'success') {
                $this->SendDebug('AirVisual', 'Get city data successfull', 0);
                $this->WriteCityData($data);
            }
            return $data_city;
        }
    }

    /**
     * Write data to variables.
     *
     * @param $data
     */
    protected function WriteCityData($data)
    {
        $city = $data->data->city;
        $this->SendDebug('AirVisual', 'City: ' . $city, 0);
        $state = $data->data->state;
        $this->SendDebug('AirVisual', 'State: ' . $state, 0);
        $country = $data->data->country;
        $this->SendDebug('AirVisual', 'Country: ' . $country, 0);
        $this->SetValue('location', $city . ' (' . $this->Translate($state) . '/' . $this->Translate($country) . ')');
        $location  = $data->data->location->coordinates;
        $longitude = $location[0];
        $latitude  = $location[1];
        $this->SendDebug('AirVisual', 'Longitude: ' . $longitude, 0);
        $this->SendDebug('AirVisual', 'Latitude: ' . $latitude, 0);

        $weather    = $data->data->current->weather;
        $weather_ts = $weather->ts;
        $this->SendDebug('AirVisual', 'Weather Timestamp: ' . $weather_ts, 0);
        $humidity = $weather->hu ? floatval($weather->hu) : 0;
        $this->SendDebug('AirVisual', 'Humidity: ' . $humidity, 0);
        $this->SetValue('humidity', $humidity);
        $ic = isset($weather->ic) ? $weather->ic : '';
        $this->SendDebug('AirVisual', 'ic: ' . $ic, 0);
        $this->SetValue('ic', $ic);

        $pressure = isset($weather->pr) ? floatval($weather->pr) : 0;
        $this->SendDebug('AirVisual', 'Pressure: ' . $pressure, 0);
        $this->SetValue('pressure', $pressure);
        $temperature = isset($weather->tp) ? floatval($weather->tp) : 0;
        $this->SendDebug('AirVisual', 'Temperature: ' . $temperature, 0);
        $this->SetValue('temperature', $temperature);
        $winddirection = isset($weather->wd) ? floatval($weather->wd) : 0;
        $this->SendDebug('AirVisual', 'Winddirection: ' . $winddirection, 0);
        $this->SetValue('winddirection', $winddirection);
        $windspeed = isset($weather->ws) ? floatval($weather->ws) : 0;
        $this->SendDebug('AirVisual', 'Windspeed: ' . $windspeed, 0);
        $this->SetValue('windspeed', $windspeed);

        $pollution    = $data->data->current->pollution;
        $pollution_ts = $pollution->ts;
        $this->SendDebug('AirVisual', 'Pollution Timestamp: ' . $pollution_ts, 0);
        $aqius = floatval($pollution->aqius);
        $this->SendDebug('AirVisual', 'AQI US: ' . $aqius, 0);
        $this->SetValue('aqius', $aqius);
        $mainus = $pollution->mainus; // string
        $this->SendDebug('AirVisual', 'Main US: ' . $mainus, 0);
        $aqicn = floatval($pollution->aqicn);
        $this->SendDebug('AirVisual', 'AQI China: ' . $aqicn, 0);
        $maincn = $pollution->maincn; // string
        $this->SendDebug('AirVisual', 'Main China: ' . $maincn, 0);
    }

    /**
     * List supported stations in a city.
     *
     * @param string $city
     * @param string $state
     * @param string $country
     *
     * @return mixed|string
     */
    public function GetCityStations(string $city, string $state, string $country)
    {
        $state    = urlencode($state);
        $country  = urlencode($country);
        $command  = 'stations?city=' . $city . '&state=' . $state . '&country=' . $country . '&key=';
        $response = $this->SendAirVisualAPIRequest($command);
        $this->SendDebug('AirVisual Response', $response, 0);
        return $response;
    }

    /**
     * Get nearest station data (IP geolocation).
     *
     * @return mixed
     */
    public function GetNearestStationData()
    {
        $command  = 'nearest_station?key=';
        $response = $this->SendAirVisualAPIRequest($command);
        $this->SendDebug('AirVisual Response', $response, 0);
        return $response;
    }

    /**
     * Get nearest station data (GPS coodinates).
     *
     * @param float $latitude
     * @param float $longitude
     *
     * @return mixed
     */
    public function GetNearestStationGPSData(float $latitude, float $longitude)
    {
        $command  = 'nearest_station?lat=' . $latitude . '&lon=' . $longitude . '&key=';
        $response = $this->SendAirVisualAPIRequest($command);
        $this->SendDebug('AirVisual Response', $response, 0);
        return $response;
    }

    /**
     * Get specified station data.
     *
     * @param string $station
     * @param string $city
     * @param string $state
     * @param string $country
     *
     * @return mixed|string
     */
    public function GetStationData(string $station, string $city, string $state, string $country)
    {
        $city     = urlencode($city);
        $state    = urlencode($state);
        $country  = urlencode($country);
        $command  = 'station?station=' . $station . '&city=' . $city . '&state=' . $state . '&country=' . $country . '&key=';
        $response = $this->SendAirVisualAPIRequest($command);
        $this->SendDebug('AirVisual Response', $response, 0);
        return $response;
    }

    protected function ErrorMessages($error)
    {
        $error_messages = [
            'success'                    => 'JSON file was generated successfully',
            'call_limit_reached'         => 'minute/monthly limit is reached',
            'call_per_day_limit_reached' => 'call per day limit reached',
            'api_key_expired'            => 'API key is expired',
            'incorrect_api_key'          => 'using wrong API key',
            'ip_location_failed'         => 'service is unable to locate IP address of request',
            'no_nearest_station'         => 'there is no nearest station within specified radius',
            'feature_not_available'      => 'call requests a feature that is not available in chosen subscription plan',
            'too_many_requests'          => 'more than 10 calls per second are made'];
        $error_message  = $error_messages[$error];
        $this->SendDebug('AirVisual', 'Error: ' . $error_message, 0);
        return $error_message;
    }

    /*
    Description	Name	Icon
   clear sky (day)	01d.png
   clear sky (night)	01n.png
   few clouds (day)	02d.png
   few clouds (night)	02n.png
   scattered clouds	03d.png
   broken clouds	04d.png
   shower rain	09d.png
   rain (day time)	10d.png
   rain (night time)	10n.png
   thunderstorm	11d.png
   snow	13d.png
   mist	50d.png
   */

    /**
     * Send to AirVisual API.
     *
     * @param $command
     *
     * @return mixed|string
     */
    protected function SendAirVisualAPIRequest($command)
    {
        $api_key = $this->ReadPropertyString('api_key');
        $curl    = curl_init();

        curl_setopt_array(
            $curl, [
                     CURLOPT_URL            => 'https://api.airvisual.com/v2/' . $command . $api_key,
                     CURLOPT_RETURNTRANSFER => true,
                     CURLOPT_ENCODING       => '',
                     CURLOPT_MAXREDIRS      => 10,
                     CURLOPT_TIMEOUT        => 30,
                     CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
                     CURLOPT_CUSTOMREQUEST  => 'GET', ]
        );

        $response = curl_exec($curl);
        $err      = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $this->SendDebug('AirVisual Error', 'cURL Error #:' . $err, 0);
            return 'cURL Error #:' . $err;
        } else {
            $payload             = $response;
            $air_visual_response = json_decode($payload, true);
            $status              = $air_visual_response['status'];
            if ($status == 'fail') {
                $this->SendDebug('AirVisual Response', 'State: ' . $status, 0);
                $data    = $air_visual_response['data'];
                $message = $data['message'];
                $this->SendDebug('AirVisual Error', 'Message: ' . $message, 0);
                if ($message == 'call_per_day_limit_reached') {
                    $this->SetStatus(206);
                }
            }
            return $response;
        }
    }

    public function RequestAction($Ident, $Value)
    {
        $this->SetValue($Ident, $Value);
        switch ($Ident) {
            case 'airvisual_update':
                $this->DataUpdate();
                break;
            default:
                $this->SendDebug('AirVisual', 'Invalid ident', 0);
        }
    }

    /**
     * gets current IP-Symcon version.
     *
     * @return float|int
     */
    protected function GetIPSVersion()
    {
        $ipsversion = floatval(IPS_GetKernelVersion());
        if ($ipsversion < 4.1) // 4.0
        {
            $ipsversion = 0;
        } elseif ($ipsversion >= 4.1 && $ipsversion < 4.2) // 4.1
        {
            $ipsversion = 1;
        } elseif ($ipsversion >= 4.2 && $ipsversion < 4.3) // 4.2
        {
            $ipsversion = 2;
        } elseif ($ipsversion >= 4.3 && $ipsversion < 4.4) // 4.3
        {
            $ipsversion = 3;
        } elseif ($ipsversion >= 4.4 && $ipsversion < 5) // 4.4
        {
            $ipsversion = 4;
        } else   // 5
        {
            $ipsversion = 5;
        }

        return $ipsversion;
    }

    protected function CheckAirVisualConnection()
    {
        $check   = ['state' => 'fail', 'message' => 'no connection'];
        $command = 'countries?key=';
        $payload = $this->SendAirVisualAPIRequest($command);
        $this->SendDebug('AirVisual Response', $payload, 0);
        $air_visual_response = json_decode($payload, true);
        $state               = $air_visual_response['status'];
        $this->SendDebug('AirVisual Response', 'State: ' . $state, 0);
        if ($state == 'fail') {
            $data             = $air_visual_response['data'];
            $message          = $data['message'];
            $error_message    = $this->ErrorMessages($message);
            $check['message'] = $error_message;
            if ($message == 'call_per_day_limit_reached') {
                $this->SetStatus(206);
            }
        } else {
            $check['state']   = 'sucess';
            $check['message'] = 'connection successfull';
            $this->SetStatus(102);
        }
        return $check;
    }

    /***********************************************************
     * Configuration Form
     ***********************************************************/

    /**
     * build configuration form.
     *
     * @return string
     */
    public function GetConfigurationForm()
    {
        // return current form
        return json_encode(
            [
                'elements' => $this->FormHead(),
                'actions'  => $this->FormActions(),
                'status'   => $this->FormStatus()]
        );
    }

    /**
     * return form configurations on configuration step.
     *
     * @return array
     */
    protected function FormHead()
    {
        $country = $this->ReadPropertyInteger('country');
        $state   = $this->ReadPropertyInteger('state');
        //$city = $this->ReadPropertyInteger("city");
        $api_key = $this->ReadPropertyString('api_key');
        $check   = $this->CheckAirVisualConnection();
        $form    = [
            [
                'type'  => 'Label',
                'label' => 'AirVisual API Key'],
            [
                'name'    => 'api_key',
                'type'    => 'ValidationTextBox',
                'caption' => 'API Key'],
            [
                'name'    => 'UpdateInterval',
                'type'    => 'IntervalBox',
                'caption' => 'Seconds']];

        if ($api_key === '') {
            $form = array_merge_recursive(
                $form, [
                         [
                             'type'    => 'Button',
                             'label'   => 'Get API Key',
                             'onClick' => 'echo "https://www.airvisual.com";']]
            );
        } else {
            if ($check['state'] == 'fail') {
                $form = array_merge_recursive(
                    $form, [
                             [
                                 'type'  => 'Label',
                                 'label' => 'AirVisual Error: ' . $check['message']]]
                );
                $this->SendDebug('AirVisual Form', 'Could not get form countries', 0);
            } else {
                $form = array_merge_recursive(
                    $form, [
                             [
                                 'name'    => 'country',
                                 'type'    => 'Select',
                                 'caption' => 'Country',
                                 'options' => $this->GetFormCountry()]]
                );
            }
        }
        if ($country != -1 && $api_key != '') {
            if ($check['state'] == 'fail') {
                $this->SendDebug('AirVisual Form', 'Could not get form state', 0);
            } else {
                $form = array_merge_recursive(
                    $form, [
                             [
                                 'name'    => 'state',
                                 'type'    => 'Select',
                                 'caption' => 'State',
                                 'options' => $this->GetFormState()]]
                );
            }
        }
        if ($state != -1 && $api_key != '') {
            if ($check['state'] == 'fail') {
                $this->SendDebug('AirVisual Form', 'Could not get form city', 0);
            } else {
                $form = array_merge_recursive(
                    $form, [
                             [
                                 'name'    => 'city',
                                 'type'    => 'Select',
                                 'caption' => 'City',
                                 'options' => $this->GetFormCity()]]
                );
            }
        }
        return $form;
    }

    protected function GetFormCountry()
    {
        $form      = [];
        $countries = $this->GetSelectionCountries();
        $this->SendDebug('AirVisual', json_encode($countries), 0);

        $form[] = [
            'label' => 'Please choose',
            'value' => -1];
        foreach ($countries as $key => $country) {
            $form[] = [
                'label' => $country,
                'value' => $key];
        }
        return $form;
    }

    protected function GetFormState()
    {
        $form   = [];
        $states = $this->GetSelectionStates();
        $this->SendDebug('AirVisual', json_encode($states), 0);

        $form[] = [
            'label' => 'Please choose',
            'value' => -1];
        foreach ($states as $key => $state) {
            $form[] = [
                'label' => $state,
                'value' => $key];
        }
        return $form;
    }

    protected function GetFormCity()
    {
        $form   = [];
        $cities = $this->GetSelectionCities();
        $this->SendDebug('AirVisual', json_encode($cities), 0);

        $form[] = [
            'label' => 'Please choose',
            'value' => -1];
        foreach ($cities as $key => $city) {
            $form[] = [
                'label' => $city,
                'value' => $key];
        }
        return $form;
    }

    /**
     * return form actions.
     *
     * @return array
     */
    protected function FormActions()
    {
        $form = [
            [
                'type'  => 'Label',
                'label' => 'Press the button to get a selection of countries and cities'],
            [
                'type'    => 'Button',
                'label'   => 'Get Selection',
                'onClick' => 'AirVisual_GetSelectionCountries($id);'],
            [
                'type'  => 'Label',
                'label' => 'Update'],
            [
                'type'    => 'Button',
                'label'   => 'Update',
                'onClick' => 'AirVisual_DataUpdate($id);']];

        return $form;
    }

    /**
     * return from status.
     *
     * @return array
     */
    protected function FormStatus()
    {
        $form = [
            [
                'code'    => IS_CREATING,
                'icon'    => 'inactive',
                'caption' => 'Creating instance.'],
            [
                'code'    => IS_ACTIVE,
                'icon'    => 'active',
                'caption' => 'AirVisual created.'],
            [
                'code'    => IS_INACTIVE,
                'icon'    => 'inactive',
                'caption' => 'interface closed.'],
            [
                'code'    => 201,
                'icon'    => 'error',
                'caption' => 'please select a country'],
            [
                'code'    => 202,
                'icon'    => 'error',
                'caption' => 'please select a state'],
            [
                'code'    => 203,
                'icon'    => 'error',
                'caption' => 'please select a city'],
            [
                'code'    => 205,
                'icon'    => 'error',
                'caption' => 'API field must not be empty.'],
            [
                'code'    => 206,
                'icon'    => 'error',
                'caption' => 'call per day limit reached']];

        return $form;
    }

    //Add this Polyfill for IP-Symcon 4.4 and older
    protected function SetValue($Ident, $Value)
    {
        if (IPS_GetKernelVersion() >= 5) {
            parent::SetValue($Ident, $Value);
        } else {
            SetValue($this->GetIDForIdent($Ident), $Value);
        }
    }
}
