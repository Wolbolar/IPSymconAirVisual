# IPSymconAirVisual
[![Version](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Symcon%20Version-%3E%205.1-green.svg)](https://www.symcon.de/service/dokumentation/installation/)
![Code](https://img.shields.io/badge/Code-PHP-blue.svg)
[![StyleCI](https://github.styleci.io/repos/124274375/shield?branch=master)](https://github.styleci.io/repos/124274375)

Modul für IP-Symcon ab Version 5.1 ermöglicht das Auslesen der Werte von AirVisual.

## Dokumentation

**Inhaltsverzeichnis**

1. [Funktionsumfang](#1-funktionsumfang)  
2. [Voraussetzungen](#2-voraussetzungen)  
3. [Installation](#3-installation)  
4. [Funktionsreferenz](#4-funktionsreferenz)
5. [Konfiguration](#5-konfiguration)  
6. [Anhang](#6-anhang)  

## 1. Funktionsumfang

Mit dem Modul lassen Werte von AirVisual auslesen und die Karte in IP-Symcon (ab Version 5.1) darstellen. 

### Anzeige:  

 - AirVisual Earth 3D 
 - Luftgüte
 - Temperatur
 - Windgeschwindigkeit
 - Windrichtung
  
## 2. Voraussetzungen

 - IPS 4.3
 - [API Key AirVisual](https://www.airvisual.com/api "API Key AirVisual")

## 3. Installation

### a. Laden des Moduls

Die Webconsole von IP-Symcon mit _http://{IP-Symcon IP}:3777/console/_ öffnen. 


Anschließend oben rechts auf das Symbol für den Modulstore (IP-Symcon > 5.1) klicken

![Store](img/store_icon.png?raw=true "open store")

Im Suchfeld nun

```
AirVisual
```  

eingeben

![Store](img/module_store_search.png?raw=true "module search")

und schließend das Modul auswählen und auf _Installieren_

![Store](img/install.png?raw=true "install")

drücken.


#### Alternatives Installieren über Modules Instanz

Den Objektbaum _Öffnen_.

![Objektbaum](img/objektbaum.png?raw=true "Objektbaum")	

Die Instanz _'Modules'_ unterhalb von Kerninstanzen im Objektbaum von IP-Symcon (>=Ver. 5.x) mit einem Doppelklick öffnen und das  _Plus_ Zeichen drücken.

![Modules](img/Modules.png?raw=true "Modules")	

![Plus](img/plus.png?raw=true "Plus")	

![ModulURL](img/add_module.png?raw=true "Add Module")
 
Im Feld die folgende URL eintragen und mit _OK_ bestätigen:

```
https://github.com/Wolbolar/IPSymconAirVisual
```  
	
Anschließend erscheint ein Eintrag für das Modul in der Liste der Instanz _Modules_    

Es wird im Standard der Zweig (Branch) _master_ geladen, dieser enthält aktuelle Änderungen und Anpassungen.
Nur der Zweig _master_ wird aktuell gehalten.

![Master](img/master.png?raw=true "master") 

Sollte eine ältere Version von IP-Symcon die kleiner ist als Version 5.1 (min 4.3) eingesetzt werden, ist auf das Zahnrad rechts in der Liste zu klicken.
Es öffnet sich ein weiteres Fenster,

![SelectBranch](img/select_branch.png?raw=true "select branch") 

hier kann man auf einen anderen Zweig wechseln, für ältere Versionen kleiner als 5.1 (min 4.3) ist hier
_Old-Version_ auszuwählen. 


### b. Einrichtung in IP-Symcon
	
In IP-Symcon nun _Instanz hinzufügen_ (_Rechtsklick -> Objekt hinzufügen -> Instanz_) auswählen unter der Kategorie, unter der man die AirVisual Instanz hinzufügen will,
und _AirVisual_ auswählen.
Im Konfigurationsformular ist der AirVisual API Key einzutragen und eine passender Ort auszuwählen. 

## 4. Funktionsreferenz

### AirVisual:

Funktionen siehe Anhang.

### Webfront:
	
![Webfront](img/AirVisual.png?raw=true "Webfront")


## 5. Konfiguration:

### AirVisual:

| Eigenschaft | Typ     | Standardwert | Funktion                                  |
| :---------: | :-----: | :----------: | :---------------------------------------: |
| api_key     | string  |              | Air Visual API Key                        |


## 6. Anhang

###  a. Funktionen:

#### AirVisual:

`AirVisual_DataUpdate(integer $InstanceID)`

Aktualisiert die Daten

`AirVisual_GetSelectionCountries(integer $InstanceID)`

Holt eine Liste der verfügbaren Länder ab

`AirVisual_GetCityData(integer $InstanceID, string $city, string $state, string $country)`

Holt Daten für eine Stadt ab

`AirVisual_GetNearestCityData(integer $InstanceID)`

Holt Daten für eine nächst gelegene Stadt mit Daten ab


###  b. GUIDs und Datenaustausch:

#### AirVisual:

GUID: `{6F94356B-0847-2EA9-7E93-32FDD6ABFD76}` 

### c. Quellen

[AirVisual API](https://www.airvisual.com/api "AirVisual API")