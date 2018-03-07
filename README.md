# IPSymconAirVisual

Modul für IP-Symcon ab Version 4.3 Ermöglicht das Ausöesen der Werte von AirVisual.

## Dokumentation

**Inhaltsverzeichnis**

1. [Funktionsumfang](#1-funktionsumfang)  
2. [Voraussetzungen](#2-voraussetzungen)  
3. [Installation](#3-installation)  
4. [Funktionsreferenz](#4-funktionsreferenz)
5. [Konfiguration](#5-konfiguartion)  
6. [Anhang](#6-anhang)  

## 1. Funktionsumfang

Mit dem Modul lassen Werte von AirVisual auslesen und die Karte in IP-Symcon (ab Version 4.3) darstellen. 

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


Die IP-Symcon (min Ver. 4.x) Konsole öffnen. Im Objektbaum unter Kerninstanzen die Instanz __*Modules*__ durch einen doppelten Mausklick öffnen.

![Modules](docs/Modules.png?raw=true "Modules")

In der _Modules_ Instanz rechts oben auf den Button __*Hinzufügen*__ drücken.

![Modules](docs/Hinzufuegen.png?raw=true "Hinzufügen")
 
In dem sich öffnenden Fenster folgende URL hinzufügen:

	
    `https://github.com/Wolbolar/IPSymconAirVisual`  
    
und mit _OK_ bestätigen.    


### b. Einrichtung in IPS
	
In IP-Symcon nun _Instanz hinzufügen_ (_CTRL+1_) auswählen unter der Kategorie, unter der man die AirVisual Instanz hinzufügen will, und _AirVisual_ auswählen.
Im Konfigurationsformular ist der AirVisual API Key einzutragen und eine passender Ort auszuwählen. 


## 4. Funktionsreferenz

### AirVisual:

Funktionen siehe Anhang.

### Webfront:
	
![Webfront](docs/AirVisual.png?raw=true "Webfront")

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








