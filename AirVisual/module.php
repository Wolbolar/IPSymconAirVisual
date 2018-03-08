<?

if (@constant('IPS_BASE') == null) //Nur wenn Konstanten noch nicht bekannt sind.
{
// --- BASE MESSAGE
	define('IPS_BASE', 10000);                             //Base Message
	define('IPS_KERNELSHUTDOWN', IPS_BASE + 1);            //Pre Shutdown Message, Runlevel UNINIT Follows
	define('IPS_KERNELSTARTED', IPS_BASE + 2);             //Post Ready Message
// --- KERNEL
	define('IPS_KERNELMESSAGE', IPS_BASE + 100);           //Kernel Message
	define('KR_CREATE', IPS_KERNELMESSAGE + 1);            //Kernel is beeing created
	define('KR_INIT', IPS_KERNELMESSAGE + 2);              //Kernel Components are beeing initialised, Modules loaded, Settings read
	define('KR_READY', IPS_KERNELMESSAGE + 3);             //Kernel is ready and running
	define('KR_UNINIT', IPS_KERNELMESSAGE + 4);            //Got Shutdown Message, unloading all stuff
	define('KR_SHUTDOWN', IPS_KERNELMESSAGE + 5);          //Uninit Complete, Destroying Kernel Inteface
// --- KERNEL LOGMESSAGE
	define('IPS_LOGMESSAGE', IPS_BASE + 200);              //Logmessage Message
	define('KL_MESSAGE', IPS_LOGMESSAGE + 1);              //Normal Message                      | FG: Black | BG: White  | STLYE : NONE
	define('KL_SUCCESS', IPS_LOGMESSAGE + 2);              //Success Message                     | FG: Black | BG: Green  | STYLE : NONE
	define('KL_NOTIFY', IPS_LOGMESSAGE + 3);               //Notiy about Changes                 | FG: Black | BG: Blue   | STLYE : NONE
	define('KL_WARNING', IPS_LOGMESSAGE + 4);              //Warnings                            | FG: Black | BG: Yellow | STLYE : NONE
	define('KL_ERROR', IPS_LOGMESSAGE + 5);                //Error Message                       | FG: Black | BG: Red    | STLYE : BOLD
	define('KL_DEBUG', IPS_LOGMESSAGE + 6);                //Debug Informations + Script Results | FG: Grey  | BG: White  | STLYE : NONE
	define('KL_CUSTOM', IPS_LOGMESSAGE + 7);               //User Message                        | FG: Black | BG: White  | STLYE : NONE
// --- MODULE LOADER
	define('IPS_MODULEMESSAGE', IPS_BASE + 300);           //ModuleLoader Message
	define('ML_LOAD', IPS_MODULEMESSAGE + 1);              //Module loaded
	define('ML_UNLOAD', IPS_MODULEMESSAGE + 2);            //Module unloaded
// --- OBJECT MANAGER
	define('IPS_OBJECTMESSAGE', IPS_BASE + 400);
	define('OM_REGISTER', IPS_OBJECTMESSAGE + 1);          //Object was registered
	define('OM_UNREGISTER', IPS_OBJECTMESSAGE + 2);        //Object was unregistered
	define('OM_CHANGEPARENT', IPS_OBJECTMESSAGE + 3);      //Parent was Changed
	define('OM_CHANGENAME', IPS_OBJECTMESSAGE + 4);        //Name was Changed
	define('OM_CHANGEINFO', IPS_OBJECTMESSAGE + 5);        //Info was Changed
	define('OM_CHANGETYPE', IPS_OBJECTMESSAGE + 6);        //Type was Changed
	define('OM_CHANGESUMMARY', IPS_OBJECTMESSAGE + 7);     //Summary was Changed
	define('OM_CHANGEPOSITION', IPS_OBJECTMESSAGE + 8);    //Position was Changed
	define('OM_CHANGEREADONLY', IPS_OBJECTMESSAGE + 9);    //ReadOnly was Changed
	define('OM_CHANGEHIDDEN', IPS_OBJECTMESSAGE + 10);     //Hidden was Changed
	define('OM_CHANGEICON', IPS_OBJECTMESSAGE + 11);       //Icon was Changed
	define('OM_CHILDADDED', IPS_OBJECTMESSAGE + 12);       //Child for Object was added
	define('OM_CHILDREMOVED', IPS_OBJECTMESSAGE + 13);     //Child for Object was removed
	define('OM_CHANGEIDENT', IPS_OBJECTMESSAGE + 14);      //Ident was Changed
	define('OM_CHANGEDISABLED', IPS_OBJECTMESSAGE + 15);   //Operability has changed
// --- INSTANCE MANAGER
	define('IPS_INSTANCEMESSAGE', IPS_BASE + 500);         //Instance Manager Message
	define('IM_CREATE', IPS_INSTANCEMESSAGE + 1);          //Instance created
	define('IM_DELETE', IPS_INSTANCEMESSAGE + 2);          //Instance deleted
	define('IM_CONNECT', IPS_INSTANCEMESSAGE + 3);         //Instance connectged
	define('IM_DISCONNECT', IPS_INSTANCEMESSAGE + 4);      //Instance disconncted
	define('IM_CHANGESTATUS', IPS_INSTANCEMESSAGE + 5);    //Status was Changed
	define('IM_CHANGESETTINGS', IPS_INSTANCEMESSAGE + 6);  //Settings were Changed
	define('IM_CHANGESEARCH', IPS_INSTANCEMESSAGE + 7);    //Searching was started/stopped
	define('IM_SEARCHUPDATE', IPS_INSTANCEMESSAGE + 8);    //Searching found new results
	define('IM_SEARCHPROGRESS', IPS_INSTANCEMESSAGE + 9);  //Searching progress in %
	define('IM_SEARCHCOMPLETE', IPS_INSTANCEMESSAGE + 10); //Searching is complete
// --- VARIABLE MANAGER
	define('IPS_VARIABLEMESSAGE', IPS_BASE + 600);              //Variable Manager Message
	define('VM_CREATE', IPS_VARIABLEMESSAGE + 1);               //Variable Created
	define('VM_DELETE', IPS_VARIABLEMESSAGE + 2);               //Variable Deleted
	define('VM_UPDATE', IPS_VARIABLEMESSAGE + 3);               //On Variable Update
	define('VM_CHANGEPROFILENAME', IPS_VARIABLEMESSAGE + 4);    //On Profile Name Change
	define('VM_CHANGEPROFILEACTION', IPS_VARIABLEMESSAGE + 5);  //On Profile Action Change
// --- SCRIPT MANAGER
	define('IPS_SCRIPTMESSAGE', IPS_BASE + 700);           //Script Manager Message
	define('SM_CREATE', IPS_SCRIPTMESSAGE + 1);            //On Script Create
	define('SM_DELETE', IPS_SCRIPTMESSAGE + 2);            //On Script Delete
	define('SM_CHANGEFILE', IPS_SCRIPTMESSAGE + 3);        //On Script File changed
	define('SM_BROKEN', IPS_SCRIPTMESSAGE + 4);            //Script Broken Status changed
// --- EVENT MANAGER
	define('IPS_EVENTMESSAGE', IPS_BASE + 800);             //Event Scripter Message
	define('EM_CREATE', IPS_EVENTMESSAGE + 1);             //On Event Create
	define('EM_DELETE', IPS_EVENTMESSAGE + 2);             //On Event Delete
	define('EM_UPDATE', IPS_EVENTMESSAGE + 3);
	define('EM_CHANGEACTIVE', IPS_EVENTMESSAGE + 4);
	define('EM_CHANGELIMIT', IPS_EVENTMESSAGE + 5);
	define('EM_CHANGESCRIPT', IPS_EVENTMESSAGE + 6);
	define('EM_CHANGETRIGGER', IPS_EVENTMESSAGE + 7);
	define('EM_CHANGETRIGGERVALUE', IPS_EVENTMESSAGE + 8);
	define('EM_CHANGETRIGGEREXECUTION', IPS_EVENTMESSAGE + 9);
	define('EM_CHANGECYCLIC', IPS_EVENTMESSAGE + 10);
	define('EM_CHANGECYCLICDATEFROM', IPS_EVENTMESSAGE + 11);
	define('EM_CHANGECYCLICDATETO', IPS_EVENTMESSAGE + 12);
	define('EM_CHANGECYCLICTIMEFROM', IPS_EVENTMESSAGE + 13);
	define('EM_CHANGECYCLICTIMETO', IPS_EVENTMESSAGE + 14);
// --- MEDIA MANAGER
	define('IPS_MEDIAMESSAGE', IPS_BASE + 900);           //Media Manager Message
	define('MM_CREATE', IPS_MEDIAMESSAGE + 1);             //On Media Create
	define('MM_DELETE', IPS_MEDIAMESSAGE + 2);             //On Media Delete
	define('MM_CHANGEFILE', IPS_MEDIAMESSAGE + 3);         //On Media File changed
	define('MM_AVAILABLE', IPS_MEDIAMESSAGE + 4);          //Media Available Status changed
	define('MM_UPDATE', IPS_MEDIAMESSAGE + 5);
// --- LINK MANAGER
	define('IPS_LINKMESSAGE', IPS_BASE + 1000);           //Link Manager Message
	define('LM_CREATE', IPS_LINKMESSAGE + 1);             //On Link Create
	define('LM_DELETE', IPS_LINKMESSAGE + 2);             //On Link Delete
	define('LM_CHANGETARGET', IPS_LINKMESSAGE + 3);       //On Link TargetID change
// --- DATA HANDLER
	define('IPS_DATAMESSAGE', IPS_BASE + 1100);             //Data Handler Message
	define('FM_CONNECT', IPS_DATAMESSAGE + 1);             //On Instance Connect
	define('FM_DISCONNECT', IPS_DATAMESSAGE + 2);          //On Instance Disconnect
// --- SCRIPT ENGINE
	define('IPS_ENGINEMESSAGE', IPS_BASE + 1200);           //Script Engine Message
	define('SE_UPDATE', IPS_ENGINEMESSAGE + 1);             //On Library Refresh
	define('SE_EXECUTE', IPS_ENGINEMESSAGE + 2);            //On Script Finished execution
	define('SE_RUNNING', IPS_ENGINEMESSAGE + 3);            //On Script Started execution
// --- PROFILE POOL
	define('IPS_PROFILEMESSAGE', IPS_BASE + 1300);
	define('PM_CREATE', IPS_PROFILEMESSAGE + 1);
	define('PM_DELETE', IPS_PROFILEMESSAGE + 2);
	define('PM_CHANGETEXT', IPS_PROFILEMESSAGE + 3);
	define('PM_CHANGEVALUES', IPS_PROFILEMESSAGE + 4);
	define('PM_CHANGEDIGITS', IPS_PROFILEMESSAGE + 5);
	define('PM_CHANGEICON', IPS_PROFILEMESSAGE + 6);
	define('PM_ASSOCIATIONADDED', IPS_PROFILEMESSAGE + 7);
	define('PM_ASSOCIATIONREMOVED', IPS_PROFILEMESSAGE + 8);
	define('PM_ASSOCIATIONCHANGED', IPS_PROFILEMESSAGE + 9);
// --- TIMER POOL
	define('IPS_TIMERMESSAGE', IPS_BASE + 1400);            //Timer Pool Message
	define('TM_REGISTER', IPS_TIMERMESSAGE + 1);
	define('TM_UNREGISTER', IPS_TIMERMESSAGE + 2);
	define('TM_SETINTERVAL', IPS_TIMERMESSAGE + 3);
	define('TM_UPDATE', IPS_TIMERMESSAGE + 4);
	define('TM_RUNNING', IPS_TIMERMESSAGE + 5);
// --- STATUS CODES
	define('IS_SBASE', 100);
	define('IS_CREATING', IS_SBASE + 1); //module is being created
	define('IS_ACTIVE', IS_SBASE + 2); //module created and running
	define('IS_DELETING', IS_SBASE + 3); //module us being deleted
	define('IS_INACTIVE', IS_SBASE + 4); //module is not beeing used
// --- ERROR CODES
	define('IS_EBASE', 200);          //default errorcode
	define('IS_NOTCREATED', IS_EBASE + 1); //instance could not be created
// --- Search Handling
	define('FOUND_UNKNOWN', 0);     //Undefined value
	define('FOUND_NEW', 1);         //Device is new and not configured yet
	define('FOUND_OLD', 2);         //Device is already configues (InstanceID should be set)
	define('FOUND_CURRENT', 3);     //Device is already configues (InstanceID is from the current/searching Instance)
	define('FOUND_UNSUPPORTED', 4); //Device is not supported by Module
	define('vtBoolean', 0);
	define('vtInteger', 1);
	define('vtFloat', 2);
	define('vtString', 3);
	define('vtArray', 8);
	define('vtObject', 9);
}

require_once(__DIR__ . "/../bootstrap.php");

use Fonzo\IPS\IPSVarType;

// module for AirVisual

class AirVisual extends IPSModule
{

	public function Create()
	{
		//Never delete this line!
		parent::Create();

		//These lines are parsed on Symcon Startup or Instance creation
		//You cannot use variables here. Just static values.

		$this->RegisterPropertyInteger('country', 24);
		$this->RegisterPropertyString('available_countries', '["Afghanistan","Andorra","Argentina","Australia","Austria","Bahamas","Bahrain","Bangladesh","Belgium","Bosnia Herzegovina","Brazil","Cambodia","Canada","Chile","China","Colombia","Croatia","Cyprus","Czech Republic","Denmark","Estonia","Ethiopia","Finland","France","Germany","Hong Kong","Hungary","India","Indonesia","Iran","Ireland","Israel","Italy","Japan","Kosovo","Kuwait","Latvia","Lithuania","Macedonia","Malaysia","Malta","Mexico","Mongolia","Morocco","Nepal","Netherlands","New Zealand","Nigeria","Norway","Pakistan","Peru","Philippines","Poland","Portugal","Puerto Rico","Russia","Saudi Arabia","Serbia","Singapore","Slovakia","Slovenia","South Korea","Spain","Sri Lanka","Sweden","Switzerland","Taiwan","Thailand","Turkey","USA","Uganda","Ukraine","United Arab Emirates","United Kingdom","Vietnam"]');
		$this->RegisterPropertyInteger('state', -1);
		$this->RegisterPropertyString('available_states', '');
		$this->RegisterPropertyString('states_germany', '["Baden-Wuerttemberg","Bavaria","Berlin","Brandenburg","Hamburg","Hesse","Lower Saxony","Mecklenburg-Vorpommern","North Rhine-Westphalia","Rheinland-Pfalz","Saarland","Saxony","Saxony-Anhalt","Schleswig-Holstein","Thuringia"]');
		$this->RegisterPropertyString('states_austria', '["Burgenland","Lower Austria","Salzburg","Styria","Tyrol","Upper Austria","Vienna","Vorarlberg"]');
		$this->RegisterPropertyString('states_switzerland', '["Basel-Landschaft","Bern","Grisons","Lucerne","Neuchatel","Schwyz","Solothurn","Thurgau","Ticino","Valais","Vaud","Zurich"]');
		$this->RegisterPropertyString('states_uk', '["England","Northern Ireland","Scotland","Wales"]');
		$this->RegisterPropertyString('states_usa', '["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","Washington, D.C.","West Virginia","Wisconsin","Wyoming"]');
		$this->RegisterPropertyString('states_china', '["Anhui","Beijing","Chongqing","Fujian","Gansu","Guangdong","Guangxi","Guizhou","Hainan","Hebei","Heilongjiang","Henan","Hubei","Hunan","Inner Mongolia","Jiangsu","Jiangxi","Jilin","Liaoning","Ningxia","Qinghai","Shaanxi","Shandong","Shanghai","Shanxi","Sichuan","Tianjin","Tibet","Xinjiang","Yunnan","Zhejiang"]');
		$this->RegisterPropertyString('states_france', '["Auvergne-Rhone-Alpes","Bourgogne-Franche-Comte","Brittany","Centre","Corsica","Grand Est","Hauts-de-France","Ile-de-France","Normandy","Nouvelle-Aquitaine","Occitanie","Pays de la Loire","Provence-Alpes-Cote d\'Azur"]');
		$this->RegisterPropertyString('states_belgium', '["Brussels Capital","Flanders","Wallonia"]');
		$this->RegisterPropertyString('states_canada', '["Alberta","British Columbia","Manitoba","New Brunswick","Newfoundland and Labrador","Northwest Territories","Nova Scotia","Ontario","Prince Edward Island","Quebec","Saskatchewan"]');
		$this->RegisterPropertyString('states_denmark', '["Capital Region","Central Denmark","Southern Denmark","Zealand"]');
		$this->RegisterPropertyString('states_india', '["Andhra Pradesh","Bihar","Delhi","Gujarat","Haryana","Jharkhand","Karnataka","Maharashtra","Punjab","Rajasthan","Tamil Nadu","Telangana","Uttar Pradesh","West Bengal"]');
		$this->RegisterPropertyString('states_italy', '["Abruzzo","Emilia-Romagna","Lombardy","Piedmont","Trentino-Alto Adige","Veneto"]');
		$this->RegisterPropertyString('states_japan', '["Aichi","Akita","Aomori","Chiba","Ehime","Fukui","Fukuoka","Fukushima","Gifu","Gunma","Hiroshima","Hokkaido","Hyogo","Ibaraki","Ishikawa","Iwate","Kagawa","Kagoshima","Kanagawa","Kochi","Kumamoto","Kyoto","Mie","Miyagi","Miyazaki","Nagano","Nagasaki","Nara","Niigata","Oita","Okayama","Okinawa","Osaka","Saga","Saitama","Shiga","Shimane","Shizuoka","Tochigi","Tokushima","Tokyo","Tottori","Toyama","Wakayama","Yamagata","Yamaguchi","Yamanashi"]');
		$this->RegisterPropertyString('states_netherlands', '["Drenthe","Flevoland","Gelderland","Groningen","Limburg","North Brabant","North Holland","Overijssel","South Holland","Utrecht","Zeeland"]');
		$this->RegisterPropertyString('states_poland', '["Greater Poland","Kujawsko-Pomorskie","Lesser Poland Voivodeship","Lodz Voivodeship","Lower Silesia","Lublin","Lubusz","Mazovia","Opole Voivodeship","Podlasie","Pomerania","Silesia","Subcarpathian Voivodeship","Swietokrzyskie","Warmia-Masuria","West Pomerania"]');
		$this->RegisterPropertyString('states_spain', '["Andalusia","Aragon","Asturias","Balearic Islands","Basque Country","Cantabria","Castille and Leon","Castille-La Mancha","Catalonia","Extremadura","Galicia","La Rioja","Madrid","Murcia","Navarre","Valencia"]');
		$this->RegisterPropertyInteger('city', -1);
		$this->RegisterPropertyString('available_cities', '');
		$this->RegisterPropertyString('api_key', '');
		$this->RegisterPropertyInteger('UpdateInterval', 60);
		$this->RegisterTimer('AirVisualDataUpdate', 0, 'AirVisual_DataUpdate(' . $this->InstanceID . ');');
		$this->RegisterVariableString('airvisual_earth_3d', $this->Translate("AirVisual Earth"), '~HTMLBox', 1);
	}

	public function ApplyChanges()
	{
		//Never delete this line!
		parent::ApplyChanges();

		$this->ValidateConfiguration();
	}

	/**
	 * Die folgenden Funktionen stehen automatisch zur Verfügung, wenn das Modul über die "Module Control" eingefügt wurden.
	 * Die Funktionen werden, mit dem selbst eingerichteten Prefix, in PHP und JSON-RPC wiefolgt zur Verfügung gestellt:
	 *
	 *
	 */

	private function ValidateConfiguration()
	{
		$api_key = $this->ReadPropertyString('api_key');

		// api key
		if ($api_key == "") {
			$this->SetStatus(205); // field must not be empty
		} else {
			$this->RegisterVariableString("location", $this->Translate("Location"), "", 2);
			$associations = Array(
				Array(0, $this->Translate("Good %d"), "", 0x74DF00), // 0 - 50 green
				Array(51, $this->Translate("Moderate %d"), "", 0xF7FE2E), // 51 - 100 yellow
				Array(101, $this->Translate("Unhealthy for Sensitive Groups %d"), "", 0xFF8000), // 101 - 150 orange
				Array(151, $this->Translate("Unhealthy %d"), "", 0xFF0000), // 151 - 200 red
				Array(201, $this->Translate("Very Unhealthy %d"), "", 0x8A0886), // 201 - 300 purple
				Array(301, $this->Translate("Hazardous %d"), "", 0x3B0B17) // 301 - 500 maroon
			);
			$this->RegisterProfileAssociation("AirVisual.aqius", "Factory", "", "", 0, 500, 0, 0, IPSVarType::vtFloat, $associations);
			$this->RegisterVariableFloat("aqius", $this->Translate("AQI US"), "AirVisual.aqius", 3);
			$this->RegisterProfileAssociation("AirVisual.mainus", "Factory", "", "", 0, 500, 0, 0, IPSVarType::vtFloat, $associations);
			//$this->RegisterVariableFloat("mainus", $this->Translate("Main US"), "AirVisual.mainus", 4);
			$this->RegisterProfileAssociation("AirVisual.aqicn", "Factory", "", "", 0, 500, 0, 0, IPSVarType::vtFloat, $associations);
			//$this->RegisterVariableFloat("aqicn", $this->Translate("AQI China"), "AirVisual.aqicn", 5);
			$this->RegisterProfileAssociation("AirVisual.maincn", "Factory", "", "", 0, 500, 0, 0, IPSVarType::vtFloat, $associations);
			//$this->RegisterVariableFloat("maincn", $this->Translate("Main China"), "AirVisual.maincn", 6);

			$this->RegisterVariableFloat("humidity", $this->Translate("Humidity"), "~Humidity.F", 10);
			$this->RegisterProfileAssociation("AirVisual.ic", "Moon", "", "", 0, 500, 0, 0, IPSVarType::vtFloat, $associations);
			$this->RegisterVariableString("ic", $this->Translate("ic"), "", 11);
			$this->RegisterVariableFloat("pressure", $this->Translate("Pressure"), "~AirPressure.F", 12);
			$this->RegisterVariableFloat("temperature", $this->Translate("Temperature"), "~Temperature", 13);
			$this->RegisterVariableFloat("winddirection", $this->Translate("Wind Direction"), "~WindDirection.F", 14);
			$this->RegisterVariableFloat("windspeed", $this->Translate("Wind Speed"), "~WindSpeed.kmh", 15);
			$this->SetVisualEarth();
			$this->SetUpdateIntervall();
		}

		// Status Aktiv
		$this->SetStatus(102);
	}

	/**
	 * Set Timer Intervall
	 */
	protected function SetUpdateIntervall()
	{
		$interval = ($this->ReadPropertyInteger("UpdateInterval")) * 1000; // interval seconds
		$this->SendDebug("AirVisual", "Set update interval to " . $interval . " seconds", 0);
		$this->SetTimerInterval("AirVisualDataUpdate", $interval);
	}

	/**
	 * Update Data
	 */
	public function DataUpdate()
	{
		$city_value = $this->ReadPropertyInteger("city");
		$city = $this->CitiesList($city_value);
		$state_value = $this->ReadPropertyInteger("state");
		$state = $this->StatesList($state_value);
		$country_value = $this->ReadPropertyInteger("country");
		$country = $this->CountriesList($country_value);
		$this->SendDebug("AirVisual Request", "Get data for location :" . $city . " (" . $state . "/" . $country . ")", 0);
		if ($city != "") {
			$data = $this->GetCityData($city, $state, $country);
		} else {
			$data_city = $this->GetNearestCityData();
			$data = json_decode($data_city);
			$status = $data->status;
			if ($status == "success") {
				$this->SendDebug("AirVisual", "Get nearest city data successfull", 0);
				$this->WriteCityData($data);
			}
		}
		return $data;
	}

	/**
	 * Get list of countries for selection form
	 */
	public function GetSelectionCountries()
	{
		$available_countries = $this->ReadPropertyString("available_countries");
		if ($available_countries == "") {
			$this->SendDebug("AirVisual", "no countries, get countries from AirVisual", 0);
			$payload = $this->ListSupportedCountries();
			$list = json_decode($payload, true);
			$status = $list["status"];
			if ($status == "success") {
				$available_countries = $list["data"];
				$countries = [];
				foreach ($available_countries as $key => $country) {
					$countries[] = $country["country"];
				}

				IPS_SetProperty($this->InstanceID, "available_countries", json_encode($countries));
				IPS_ApplyChanges($this->InstanceID);
				return $countries;
			} else {
				$this->SendDebug("AirVisual", "could not get countries list", 0);
				return false;
			}
		} else {
			$countries = json_decode($available_countries, true);
			return $countries;
		}
	}

	/**
	 * Get list of states for selection form
	 * @return array|bool
	 */
	protected function GetSelectionStates()
	{
		$country_value = $this->GetCountriesValue();
		$country = $this->CountriesList($country_value);
		if ($country_value == -1) {
			$this->SetStatus(201);
			$this->SendDebug("AirVisual", "no country selected", 0);
			return false;
		} elseif ($country_value == 24 && $country == "Germany") {
			$available_states = $this->ReadPropertyString("states_germany");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 4 && $country == "Austria") {
			$available_states = $this->ReadPropertyString("states_austria");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 65 && $country == "Switzerland") {
			$available_states = $this->ReadPropertyString("states_switzerland");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 73 && $country == "United Kingdom") {
			$available_states = $this->ReadPropertyString("states_uk");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 70 && $country == "USA") {
			$available_states = $this->ReadPropertyString("states_usa");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 14 && $country == "China") {
			$available_states = $this->ReadPropertyString("states_china");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 23 && $country == "France") {
			$available_states = $this->ReadPropertyString("states_france");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 8 && $country == "Belgium") {
			$available_states = $this->ReadPropertyString("states_belgium");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 12 && $country == "Canada") {
			$available_states = $this->ReadPropertyString("states_canada");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 19 && $country == "Denmark") {
			$available_states = $this->ReadPropertyString("states_denmark");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 27 && $country == "India") {
			$available_states = $this->ReadPropertyString("states_india");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 32 && $country == "Italy") {
			$available_states = $this->ReadPropertyString("states_italy");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 33 && $country == "Japan") {
			$available_states = $this->ReadPropertyString("states_japan");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 45 && $country == "Netherlands") {
			$available_states = $this->ReadPropertyString("states_netherlands");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 52 && $country == "Poland") {
			$available_states = $this->ReadPropertyString("states_poland");
			$states = json_decode($available_states, true);
			return $states;
		} elseif ($country_value == 62 && $country == "Spain") {
			$available_states = $this->ReadPropertyString("states_spain");
			$states = json_decode($available_states, true);
			return $states;
		} else {
			$payload = $this->ListStates($country);
			$list = json_decode($payload, true);
			$status = $list["status"];
			if ($status == "success") {
				$available_states = $list["data"];
				$states = [];
				foreach ($available_states as $key => $state) {
					$states[] = $state["state"];
				}
				IPS_SetProperty($this->InstanceID, "available_states", json_encode($states));
				IPS_ApplyChanges($this->InstanceID);
				$this->SendDebug("AirVisual", "states: " . json_encode($states), 0);
				return $states;
			} else {
				$this->SendDebug("AirVisual", "could not get states list", 0);
				return false;
			}
		}
	}

	/**
	 * Get list of coties for selection form
	 * @return array|bool
	 */
	protected function GetSelectionCities()
	{
		$country_value = $this->GetCountriesValue();
		$state_value = $this->GetStateValue();
		if ($country_value == -1) {
			$this->SetStatus(201);
			$this->SendDebug("AirVisual", "no country selected", 0);
			return false;
		} elseif ($state_value == -1) {
			$this->SetStatus(202);
			$this->SendDebug("AirVisual", "no state selected", 0);
			return false;
		} else {
			$country = $this->CountriesList($country_value);
			$state = $this->StatesList($state_value);
			$payload = $this->ListCities($state, $country);
			$list = json_decode($payload, true);
			$status = $list["status"];
			if ($status == "success") {
				$available_cities = $list["data"];
				$cities = [];
				foreach ($available_cities as $key => $city) {
					$cities[] = $city["city"];
				}
				IPS_SetProperty($this->InstanceID, "available_cities", json_encode($cities));
				IPS_ApplyChanges($this->InstanceID);
				return $cities;
			} else {
				$this->SendDebug("AirVisual", "could not get cities list", 0);
				return false;
			}
		}
	}

	/**
	 * Get city selection
	 * @return bool
	 */
	protected function GetCityValue()
	{
		$city_value = $this->ReadPropertyInteger("city");
		$this->SendDebug("AirVisual", "City selected: " . $city_value, 0);
		return $city_value;
	}

	/**
	 * Set city selection
	 * @param $city_value
	 */
	protected function SetCityValue($city_value)
	{
		IPS_SetProperty($this->InstanceID, "city", $city_value);
		IPS_ApplyChanges($this->InstanceID);
	}

	/**
	 * Get city for the selection
	 * @param $city_value
	 * @return mixed
	 */
	protected function CitiesList(int $city_value)
	{
		$available_cities = $this->ReadPropertyString("available_cities");
		if ($available_cities == "") {
			$this->SendDebug("AirVisual", "no city, get cities from AirVisual", 0);
			$cities = $this->GetSelectionCities();

		} else {
			$cities = json_decode($available_cities, true);
		}

		$this->SendDebug("AirVisual", "state selection number " . $city_value, 0);
		$this->SendDebug("AirVisual States", $available_cities, 0);
		$city = $cities[$city_value];
		$this->SendDebug("AirVisual", "state selected " . $city, 0);
		return $city;
	}

	/**
	 * Get state selection
	 * @return bool
	 */
	protected function GetStateValue()
	{
		$states_value = $this->ReadPropertyInteger("state");
		$this->SendDebug("AirVisual", "State selected: " . $states_value, 0);
		return $states_value;
	}

	/**
	 * Set state selection
	 * @param $states_value
	 */
	protected function SetStateValue($states_value)
	{
		IPS_SetProperty($this->InstanceID, "state", $states_value);
		IPS_ApplyChanges($this->InstanceID);
	}

	/**
	 * Get state for the selection
	 * @param $state_value
	 * @return mixed
	 */
	protected function StatesList(int $state_value)
	{
		$country_value = $this->GetCountriesValue();
		$country = $this->CountriesList($country_value);
		$available_states = $this->ReadPropertyString("available_states");
		if ($country_value == 24 && $country == "Germany") {
			$available_states = $this->ReadPropertyString("states_germany");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 4 && $country == "Austria") {
			$available_states = $this->ReadPropertyString("states_austria");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 65 && $country == "Switzerland") {
			$available_states = $this->ReadPropertyString("states_switzerland");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 73 && $country == "United Kingdom") {
			$available_states = $this->ReadPropertyString("states_uk");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 70 && $country == "USA") {
			$available_states = $this->ReadPropertyString("states_usa");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 14 && $country == "China") {
			$available_states = $this->ReadPropertyString("states_china");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 23 && $country == "France") {
			$available_states = $this->ReadPropertyString("states_france");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 8 && $country == "Belgium") {
			$available_states = $this->ReadPropertyString("states_belgium");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 12 && $country == "Canada") {
			$available_states = $this->ReadPropertyString("states_canada");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 19 && $country == "Denmark") {
			$available_states = $this->ReadPropertyString("states_denmark");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 27 && $country == "India") {
			$available_states = $this->ReadPropertyString("states_india");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 32 && $country == "Italy") {
			$available_states = $this->ReadPropertyString("states_italy");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 33 && $country == "Japan") {
			$available_states = $this->ReadPropertyString("states_japan");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 45 && $country == "Netherlands") {
			$available_states = $this->ReadPropertyString("states_netherlands");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 52 && $country == "Poland") {
			$available_states = $this->ReadPropertyString("states_poland");
			$states = json_decode($available_states, true);
		} elseif ($country_value == 62 && $country == "Spain") {
			$available_states = $this->ReadPropertyString("states_spain");
			$states = json_decode($available_states, true);
		} elseif ($available_states == "") {
			$this->SendDebug("AirVisual", "no states, get states from AirVisual", 0);
			$states = $this->GetSelectionStates();
		} else {
			$states = json_decode($available_states, true);
		}
		$this->SendDebug("AirVisual", "state selection number " . $state_value, 0);
		$this->SendDebug("AirVisual States", $available_states, 0);
		$state = $states[$state_value];
		$this->SendDebug("AirVisual", "state selected " . $state, 0);
		return $state;
	}

	/**
	 * Get country selection
	 * @return bool
	 */
	protected function GetCountriesValue()
	{
		$countries_value = $this->ReadPropertyInteger("country");
		$this->SendDebug("AirVisual", "Country selected: " . $countries_value, 0);
		return $countries_value;
	}

	/**
	 * Set country selection
	 * @param $countries_value
	 */
	protected function SetCountriesValue($countries_value)
	{
		IPS_SetProperty($this->InstanceID, "country", $countries_value);
		IPS_ApplyChanges($this->InstanceID);
	}

	/**
	 * Get country for the selection
	 * @param $country_value
	 * @return mixed
	 */
	protected function CountriesList(int $country_value)
	{
		$available_countries = $this->ReadPropertyString("available_countries");
		if ($available_countries == "") {
			$this->SendDebug("AirVisual", "no countries, get countries from AirVisual", 0);
			$countries = $this->GetSelectionCountries();
		} else {
			$countries = json_decode($available_countries, true);
		}
		$this->SendDebug("AirVisual", "country selection number " . $country_value, 0);
		$this->SendDebug("AirVisual States", $available_countries, 0);
		$country = $countries[$country_value];
		$this->SendDebug("AirVisual", "country selected " . $country, 0);
		return $country;
	}

	/**
	 * Set Value Visual Earth 3D
	 */
	private function SetVisualEarth()
	{
		$airvisual_earth = GetValue($this->GetIDForIdent("airvisual_earth_3d"));
		if ($airvisual_earth == "") {
			$web_url = "https://www.airvisual.com/earth"; // URL AirVisual Earth
			$height = "450px"; // height
			$width = "100%"; // width
			$content = '<iframe src="' . $web_url . '" frameborder="0" style= "width: ' . $width . '; height: ' . $height . ';"/></iframe>';
			$this->SetValue("airvisual_earth_3d", $content);
		}
	}

	/**
	 * List supported countries
	 * @return mixed|string
	 */
	public function ListSupportedCountries()
	{
		$command = 'countries?key=';
		$response = $this->SendAirVisualAPIRequest($command);
		$this->SendDebug("AirVisual Response", $response, 0);
		return $response;
	}

	/**
	 * List supported states in a country
	 * @param string $country
	 * @return mixed|string
	 */
	public function ListStates(string $country)
	{
		$country = urlencode($country);
		$command = 'states?country=' . $country . '&key=';
		$response = $this->SendAirVisualAPIRequest($command);
		$this->SendDebug("AirVisual Response", $response, 0);
		return $response;
	}

	/**
	 * List supported cities in a state
	 * @param $state
	 * @param $country
	 * @return mixed|string
	 */
	public function ListCities(string $state, string $country)
	{
		$state = urlencode($state);
		$country = urlencode($country);
		$command = 'cities?state=' . $state . '&country=' . $country . '&key=';
		$response = $this->SendAirVisualAPIRequest($command);
		$this->SendDebug("AirVisual Response", $response, 0);
		return $response;
	}

	/**
	 * Get nearest city data (IP geolocation)
	 * @return mixed|string
	 */
	public function GetNearestCityData()
	{
		$command = 'nearest_city?key=';
		$data_city = $this->SendAirVisualAPIRequest($command);
		$this->SendDebug("AirVisual Response", $data_city, 0);
		$data = json_decode($data_city);
		$status = $data->status;
		$this->SendDebug("AirVisual Request Status", $status, 0);
		if ($status == "success") {
			$this->SendDebug("AirVisual", "Get city data successfull", 0);
			$this->WriteCityData($data);
		}
		return $data_city;
	}

	/**
	 * Get nearest city data (GPS coordinates)
	 * @param float $latitude
	 * @param float $longitude
	 * @return mixed|string
	 */
	public function GetNearestCityDataGPS(float $latitude, float $longitude)
	{
		$command = 'nearest_city?lat=' . $latitude . '&lon=' . $longitude . '&key=';
		$data_city = $this->SendAirVisualAPIRequest($command);
		$this->SendDebug("AirVisual Response", $data_city, 0);
		$data = json_decode($data_city);
		$status = $data->status;
		$this->SendDebug("AirVisual Request Status", $status, 0);
		if ($status == "success") {
			$this->SendDebug("AirVisual", "Get city data successfull", 0);
			$this->WriteCityData($data);
		}
		return $data_city;
	}


	/**
	 * Get specified city data
	 * @param string $city
	 * @param string $state
	 * @param string $country
	 * @return mixed|string
	 */
	public function GetCityData(string $city, string $state, string $country)
	{
		$state = urlencode($state);
		$country = urlencode($country);
		$command = 'city?city=' . $city . '&state=' . $state . '&country=' . $country . '&key=';
		$data_city = $this->SendAirVisualAPIRequest($command);
		$this->SendDebug("AirVisual Response", $data_city, 0);
		if (empty($data_city)) {
			$this->SendDebug("AirVisual Request Status", "no respone for this city", 0);
			return "";
		} else {
			$data = json_decode($data_city);
			$status = $data->status;
			$this->SendDebug("AirVisual Request Status", $status, 0);
			if ($status == "success") {
				$this->SendDebug("AirVisual", "Get city data successfull", 0);
				$this->WriteCityData($data);
			}
			return $data_city;
		}
	}

	/**
	 * Write data to variables
	 * @param $data
	 */
	protected function WriteCityData($data)
	{
		$city = $data->data->city;
		$this->SendDebug("AirVisual", "City: " . $city, 0);
		$state = $data->data->state;
		$this->SendDebug("AirVisual", "State: " . $state, 0);
		$country = $data->data->country;
		$this->SendDebug("AirVisual", "Country: " . $country, 0);
		$this->SetValue("location", $city . " (" . $this->Translate($state) . "/" . $this->Translate($country) . ")");
		$location = $data->data->location->coordinates;
		$longitude = $location[0];
		$latitude = $location[1];
		$this->SendDebug("AirVisual", "Longitude: " . $longitude, 0);
		$this->SendDebug("AirVisual", "Latitude: " . $latitude, 0);

		$weather = $data->data->current->weather;
		$weather_ts = $weather->ts;
		$this->SendDebug("AirVisual", "Weather Timestamp: " . $weather_ts, 0);
		$humidity = floatval($weather->hu);
		$this->SendDebug("AirVisual", "Humidity: " . $humidity, 0);
		$this->SetValue("humidity", $humidity);
		$ic = $weather->ic;
		$this->SendDebug("AirVisual", "ic: " . $ic, 0);
		$this->SetValue("ic", $ic);
		$pressure = floatval($weather->pr);
		$this->SendDebug("AirVisual", "Pressure: " . $pressure, 0);
		$this->SetValue("pressure", $pressure);
		$temperature = floatval($weather->tp);
		$this->SendDebug("AirVisual", "Temperature: " . $temperature, 0);
		$this->SetValue("temperature", $temperature);
		$winddirection = floatval($weather->wd);
		$this->SendDebug("AirVisual", "Winddirection: " . $winddirection, 0);
		$this->SetValue("winddirection", $winddirection);
		$windspeed = floatval($weather->ws);
		$this->SendDebug("AirVisual", "Windspeed: " . $windspeed, 0);
		$this->SetValue("windspeed", $windspeed);

		$pollution = $data->data->current->pollution;
		$pollution_ts = $pollution->ts;
		$this->SendDebug("AirVisual", "Pollution Timestamp: " . $pollution_ts, 0);
		$aqius = floatval($pollution->aqius);
		$this->SendDebug("AirVisual", "AQI US: " . $aqius, 0);
		$this->SetValue("aqius", $aqius);
		$mainus = $pollution->mainus; // string
		$this->SendDebug("AirVisual", "Main US: " . $mainus, 0);
		$aqicn = floatval($pollution->aqicn);
		$this->SendDebug("AirVisual", "AQI China: " . $aqicn, 0);
		$maincn = $pollution->maincn; // string
		$this->SendDebug("AirVisual", "Main China: " . $maincn, 0);
	}

	/**
	 * List supported stations in a city
	 * @param string $city
	 * @param string $state
	 * @param string $country
	 * @return mixed|string
	 */
	public function GetCityStations(string $city, string $state, string $country)
	{
		$state = urlencode($state);
		$country = urlencode($country);
		$command = 'stations?city=' . $city . '&state=' . $state . '&country=' . $country . '&key=';
		$response = $this->SendAirVisualAPIRequest($command);
		$this->SendDebug("AirVisual Response", $response, 0);
		return $response;
	}

	/**
	 * Get nearest station data (IP geolocation)
	 * @return mixed
	 */
	public function GetNearestStationData()
	{
		$command = 'nearest_station?key=';
		$response = $this->SendAirVisualAPIRequest($command);
		$this->SendDebug("AirVisual Response", $response, 0);
		return $response;
	}


	/**
	 * Get nearest station data (GPS coodinates)
	 * @param float $latitude
	 * @param float $longitude
	 * @return mixed
	 */
	public function GetNearestStationGPSData(float $latitude, float $longitude)
	{
		$command = 'nearest_station?lat=' . $latitude . '&lon=' . $longitude . '&key=';
		$response = $this->SendAirVisualAPIRequest($command);
		$this->SendDebug("AirVisual Response", $response, 0);
		return $response;
	}

	/**
	 * Get specified station data
	 * @param string $station
	 * @param string $city
	 * @param string $state
	 * @param string $country
	 * @return mixed|string
	 */
	public function GetStationData(string $station, string $city, string $state, string $country)
	{
		$city = urlencode($city);
		$state = urlencode($state);
		$country = urlencode($country);
		$command = 'station?station=' . $station . '&city=' . $city . '&state=' . $state . '&country=' . $country . '&key=';
		$response = $this->SendAirVisualAPIRequest($command);
		$this->SendDebug("AirVisual Response", $response, 0);
		return $response;
	}

	protected function ErrorMessages($error)
	{
		$error_messages = array(
			"success" => "JSON file was generated successfully",
			"call_limit_reached" => "minute/monthly limit is reached",
			"api_key_expired" => "API key is expired",
			"incorrect_api_key" => "using wrong API key",
			"ip_location_failed" => "service is unable to locate IP address of request",
			"no_nearest_station" => "there is no nearest station within specified radius",
			"feature_not_available" => "call requests a feature that is not available in chosen subscription plan",
			"too_many_requests" => "more than 10 calls per second are made"
		);
		$error_message = $error_messages[$error];
		$this->SendDebug("AirVisual", $error_message, 0);
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
	 * Send to AirVisual API
	 * @param $command
	 * @return mixed|string
	 */
	protected function SendAirVisualAPIRequest($command)
	{
		$api_key = $this->ReadPropertyString("api_key");
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.airvisual.com/v2/" . $command . $api_key,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			$this->SendDebug("AirVisual Error", "cURL Error #:" . $err, 0);
			return "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}


	public function RequestAction($Ident, $Value)
	{
		$this->SetValue($Ident, $Value);
		switch ($Ident) {
			case "airvisual_update":
				$this->DataUpdate();
				break;
			default:
				$this->SendDebug("AirVisual", "Invalid ident", 0);
		}
	}

	/**
	 * gets current IP-Symcon version
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

	//Profile
	protected function RegisterProfile($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $StepSize, $Digits, $Vartype)
	{

		if (!IPS_VariableProfileExists($Name)) {
			IPS_CreateVariableProfile($Name, $Vartype); // 0 boolean, 1 int, 2 float, 3 string,
		} else {
			$profile = IPS_GetVariableProfile($Name);
			if ($profile['ProfileType'] != $Vartype)
				$this->SendDebug("BMW:", "Variable profile type does not match for profile " . $Name, 0);
		}

		IPS_SetVariableProfileIcon($Name, $Icon);
		IPS_SetVariableProfileText($Name, $Prefix, $Suffix);
		IPS_SetVariableProfileDigits($Name, $Digits); //  Nachkommastellen
		IPS_SetVariableProfileValues($Name, $MinValue, $MaxValue, $StepSize); // string $ProfilName, float $Minimalwert, float $Maximalwert, float $Schrittweite
	}

	protected function RegisterProfileAssociation($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $Stepsize, $Digits, $Vartype, $Associations)
	{
		if (sizeof($Associations) === 0) {
			$MinValue = 0;
			$MaxValue = 0;
		}

		$this->RegisterProfile($Name, $Icon, $Prefix, $Suffix, $MinValue, $MaxValue, $Stepsize, $Digits, $Vartype);

		//boolean IPS_SetVariableProfileAssociation ( string $ProfilName, float $Wert, string $Name, string $Icon, integer $Farbe )
		foreach ($Associations as $Association) {
			IPS_SetVariableProfileAssociation($Name, $Association[0], $Association[1], $Association[2], $Association[3]);
		}

	}

	/***********************************************************
	 * Configuration Form
	 ***********************************************************/

	/**
	 * build configuration form
	 * @return string
	 */
	public function GetConfigurationForm()
	{
		// return current form
		return json_encode([
			'elements' => $this->FormHead(),
			'actions' => $this->FormActions(),
			'status' => $this->FormStatus()
		]);
	}

	/**
	 * return form configurations on configuration step
	 * @return array
	 */
	protected function FormHead()
	{
		$country = $this->ReadPropertyInteger("country");
		$state = $this->ReadPropertyInteger("state");
		//$city = $this->ReadPropertyInteger("city");
		$api_key = $this->ReadPropertyString("api_key");
		$form = [
			[
				'type' => 'Label',
				'label' => 'AirVisual API Key'
			],
			[
				'name' => 'api_key',
				'type' => 'ValidationTextBox',
				'caption' => 'API Key'
			],
			[
				'name' => 'UpdateInterval',
				'type' => 'IntervalBox',
				'caption' => 'Seconds'
			]
		];

		if ($api_key != "") {
			$form = array_merge_recursive(
				$form,
				[
					[
						'name' => 'country',
						'type' => 'Select',
						'caption' => 'Country',
						'options' => $this->GetFormCountry()
					]
				]
			);
		}
		if ($country != -1) {
			$form = array_merge_recursive(
				$form,
				[
					[
						'name' => 'state',
						'type' => 'Select',
						'caption' => 'State',
						'options' => $this->GetFormState()
					],

				]
			);
		}
		if ($state != -1) {
			$form = array_merge_recursive(
				$form,
				[
					[
						'name' => 'city',
						'type' => 'Select',
						'caption' => 'City',
						'options' => $this->GetFormCity()
					]
				]
			);
		}

		return $form;
	}

	protected function GetFormCountry()
	{
		$countries = $this->GetSelectionCountries();
		$this->SendDebug("AirVisual", json_encode($countries), 0);
		$form = [];
		$form[] = [
			'label' => 'Please choose',
			'value' => -1
		];
		foreach ($countries as $key => $country) {
			$form[] = [
				'label' => $country,
				'value' => $key
			];
		}
		return $form;
	}

	protected function GetFormState()
	{
		$states = $this->GetSelectionStates();
		$this->SendDebug("AirVisual", json_encode($states), 0);
		$form = [];
		$form[] = [
			'label' => 'Please choose',
			'value' => -1
		];
		foreach ($states as $key => $state) {
			$form[] = [
				'label' => $state,
				'value' => $key
			];
		}
		return $form;
	}

	protected function GetFormCity()
	{
		$cities = $this->GetSelectionCities();
		$this->SendDebug("AirVisual", json_encode($cities), 0);
		$form = [];
		$form[] = [
			'label' => 'Please choose',
			'value' => -1
		];
		foreach ($cities as $key => $city) {
			$form[] = [
				'label' => $city,
				'value' => $key
			];
		}
		return $form;
	}

	/**
	 * return form actions
	 * @return array
	 */
	protected function FormActions()
	{
		$form = [
			[
				'type' => 'Label',
				'label' => 'Press the button to get a selection of countries and cities'
			],
			[
				'type' => 'Button',
				'label' => 'Get Selection',
				'onClick' => 'AirVisual_GetSelectionCountries($id);'
			],
			[
				'type' => 'Label',
				'label' => 'Update'
			],
			[
				'type' => 'Button',
				'label' => 'Update',
				'onClick' => 'AirVisual_DataUpdate($id);'
			]
		];

		return $form;
	}

	/**
	 * return from status
	 * @return array
	 */
	protected function FormStatus()
	{
		$form = [
			[
				'code' => 101,
				'icon' => 'inactive',
				'caption' => 'Creating instance.'
			],
			[
				'code' => 102,
				'icon' => 'active',
				'caption' => 'AirVisual created.'
			],
			[
				'code' => 104,
				'icon' => 'inactive',
				'caption' => 'interface closed.'
			],
			[
				'code' => 201,
				'icon' => 'error',
				'caption' => 'please select a country'
			],
			[
				'code' => 202,
				'icon' => 'error',
				'caption' => 'please select a state'
			],
			[
				'code' => 203,
				'icon' => 'error',
				'caption' => 'please select a city'
			],
			[
				'code' => 205,
				'icon' => 'error',
				'caption' => 'field must not be empty.'
			]
		];

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