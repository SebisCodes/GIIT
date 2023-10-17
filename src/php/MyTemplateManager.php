<?php
namespace MyTemplateManager;
require_once './src/php/MyHTMLBuilder/MyList.php';
use MyHTMLBuilder\MyTag;
use MyHTMLBuilder\MyList;

/**
 * Used to simply manage the creation dynamic HTML-Text using php
 *
 * @package MyTemplateManager
 * @author Sebastian Gr&uuml;nwald
 */
class MyTemplateManager {
    /**
     *
     * @var string $lang_default Default language code
     */
    private $lang_default = 'en';
    /**
     *
     * @var string $lang_uri Language extracted from url
     */
    private $lang_uri;
    /**
     *
     * @var string $lang_browser Language extracted from browser methadata
     */
    private $lang_browser;
    /**
     *
     * @var array $lang_supported Array with supported languages
     */
    private $lang_supported = array('en','de');
    
    /**
     * Create and initialize this object
     *
     */
    public function __construct()
    {
        $this->lang_uri = htmlspecialchars(isset($_GET["lang"])?$_GET["lang"]:'');
        $this->lang_browser = htmlspecialchars(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));
    }
    /**
     * Get the language code from browser or url (url has higher priority)
     *
     * @return string Langauge code (en, de, ...)
     */
    public function getLanguageCode() {
        $language = (in_array($this->lang_uri, $this->lang_supported) ? $this->lang_uri : '');
        if ($language == '') {
            $language = (in_array($this->lang_browser, $this->lang_supported) ? $this->lang_browser : $this->lang_default);
        }
        return $language;
    }
    /**
     * A function to get a template 
     *
     * @param string $language Language string (de, en, de-ch, ...)
     * @return string The HTML-Text in the prefered language
     */
    public function Template_Keywords($language) {
        $s = "";
        switch($language) {
            case 'de':
                $s = "Programmiersprachen, Sprachen, Angebot, C, C#, Java, Javascript, HTML, CSS, PHP, Python, VB. NET, VBA, VBA, Microsoft, Power, Fx, Automatisieren, Apps, Dienstleistungen, Programmieren, Angebot, Reparatur, Startup, Grünwald, Grünwald, Innovation, Beratung, Support, Autodesk, Inventor, AutoCAD, Siemens, NX, UG, Office, Word, Excel, PowerPoint, Outlook, 365, Arduino, Zwiebel, Omega, Raspberry, PI, STM, STM32, Android, Windows, Linux, Geräte, Desktop, Web, Anfrage, Made, in, Schweiz, Schweizer";
                break;
            default:
                $s = "Languages, Offer, C, C#, Java, Javascript, HTML, CSS, PHP, Python, VB.NET, VBA, VBA, Microsoft, Power, Fx, Automate, Apps, Services, Programmming, Offer, Repair, Startup, Grünwald, Gruenwald, Innovation, Consulting, Support, Autodesk, Inventor, AutoCAD, Siemens, NX, UG, Office, Word, Excel, PowerPoint, Outlook, 365, Arduino, Onion, Omega, Raspberry, PI, STM, STM32, Android, Windows, Linux, Devices, Desktop, Web, Request, Made, in, Switzerland, Swiss";
                break;
            }
        return $s;
    }
    /**
     * A function to get a template 
     *
     * @param string $language Language string (de, en, de-ch, ...)
     * @return string The HTML-Text in the prefered language
     */
    public function Template_Description($language) {
        $s = "";
        switch($language) {
            case 'de':
                $s = "Gruenwald Innovation - Lassen Sie Software made in Switzerland für sich arbeiten. Wir bieten Dienstleistungen wie Gerätereparaturen, Programmierung, Beratung und Support.";
                break;
            default:
                $s = "Gruenwald Innovation - Let software made in Switzerland work for you. We offer services like device repairs, programming, consulting and support.";
                break;
            }
        return $s;
    }
    /**
     * A function to get a template 
     *
     * @param string $language Language string (de, en, de-ch, ...)
     * @return string The HTML-Text in the prefered language
     */
    public function Template_ShortDescription($language) {
        $iTag = new MyTag('i');
        switch($language) {
            case 'de':
                $iTag->append('Programmierung, Automatisierung, Beratung, Support und Ger&auml;tereparaturen.');
                $iTag->append('<br /><br />');
                $iTag->append('Mit meiner fundierten und vielseitigen Erfahrung seit 2015 in verschiedensten Projekten im privaten und beruflichen Umfeld biete ich Ihnen massgeschneiderte L&ouml;sungen f&uuml;r Ihre Automatisierungsaufgaben auf h&ouml;chstem Niveau.');
                $iTag->append('<br /><br /><br />');
                $iTag->append('Lassen Sie Software f&uuml;r sich arbeiten!');
                break;
            default:
                $iTag->append('Programming, Automation, Consulting, Support and Device Repair.');
                $iTag->append('<br /><br />');
                $iTag->append('Utilizing my extensive and in-depth IT skills acquired from various projects in both personal and professional settings since 2015, I can provide you with customized and cutting-edge solutions for your automation challenges.');
                $iTag->append('<br /><br /><br />');
                $iTag->append('Let software work for you!');
                break;
        }
        return $iTag->getText();
    }
    
    /**
     * A function to get a template 
     *
     * @param string $language Language string (de, en, de-ch, ...)
     * @return string The HTML-Text in the prefered language
     */
    public function Template_OfferedLanguages($language) {
        $tTag = new MyTag('b'); //Title List Tag
        $olTag = new MyTag('ul'); //Outer List Tag
        $ilTag = new MyTag('li'); //Inner List Tag
        $list = new MyList($tTag, $olTag, $ilTag);

        switch($language) {
            case 'de':
                $tTag->setValue('Angebotene Programmiersprachen');
                break;
            default: //en
                $tTag->setValue('Offered Languages');
                break;
        }
        $list->addRow('C');
        $list->addRow('C#');
        $list->addRow('Java');
        $list->addRow('Jaascript (+ HTML & CSS)');
        $list->addRow('PHP');
        $list->addRow('Python');
        $list->addRow('VB.NET');
        $list->addRow('VBA');
        $list->addRow('Microsoft Power Fx (Power Automate, Power Apps, ...)');

        return $list->getText();
    }
    /**
     * A function to get a template 
     *
     * @param string $language Language string (de, en, de-ch, ...)
     * @return string The HTML-Text in the prefered language
     */
    public function Template_ExampleApplicationsForAutomation($language) {
        $tMainTag = new MyTag('b'); //Title List Tag
        $olMainTag = new MyTag('ul'); //Outer List Tag
        $ilMainTag = new MyTag('li'); //Inner List Tag
        $mainList = new MyList($tMainTag, $olMainTag, $ilMainTag);
        
        $urlTags = array(
            'Inv_UpdateTitleBlock' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/VBAScripts/tree/main/Autodesk%20Inventor/UpdateTitleblock')
            ->getText(),
            'Inv_AutomaticPiping' => (New MyTag('a'))
            ->setValue('Instagram')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://www.instagram.com/p/Cbp_JtUPpzc/?next=%2Fsebisprojects%2F')
            ->getText(),
            'Inv_ImportSTEP' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/VBAScripts/tree/main/Autodesk%20Inventor/AssemblyToPart')
            ->getText(),
            'ACAD_SHXRemoval' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/PythonScripts/tree/main/SHXtoText')
            ->getText(),
            'ACAD_MergePDF' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/PythonScripts/tree/main/PDF%20Merge')
            ->getText(),
            'Excel_PivotEdit' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/VBAScripts/tree/main/Excel/PivotTableDirectEdit')
            ->getText(),
            'Outl_UnsubscribeList' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/VBAScripts/tree/main/Outlook')
            ->getText(),
            'Web_LearningApps' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/LearningApps')
            ->getText(),
            'Web_QR-ID.io' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/qr-id.io')
            ->getText(),
            'Web_GIIT' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/GIIT')
            ->getText()
        );

        switch($language) {
            case 'de':
                $tMainTag->setValue('Beispiele f&uuml;r Programmierungsaufträge');

                $tTag = new MyTag(''); //Title List Tag
                $olTag = new MyTag('ul'); //Outer List Tag
                $ilTag = new MyTag('li'); //Inner List Tag
                $list = new MyList($tTag, $olTag, $ilTag);

                $tTag->setValue('Autodesk Inventor');
                $list->remRows();
                $list->addRow('Beim Speichern einen automatischen Export einer PDF-Datei in einen vordefinierten Pfad, der auf den Daten des Zeichnungskopfs basiert ausf&uuml;hren');
                $list->addRow('Automatische Bereinigung der Zeichnung beim &ouml;ffnen');
                $list->addRow('Aktualisierung der Symbole aus einer Vorlage bei Knopfdruck');
                $list->addRow('Aktualisierung des Zeichnungskopfes bei Knopfdruck (siehe '.$urlTags['Inv_UpdateTitleBlock'].')');
                $list->addRow('Automatische Erstellung von Rohrleitungen bei Knopfdruck (siehe '.$urlTags['Inv_AutomaticPiping'].')');
                $list->addRow('Automatische Konvertierung einer Baugruppe zu einem Einzelteil (z.B. wenn eine grosse STEP-Datei importiert wurde und viele unn&ouml;tige Unterbaugruppen Erzeugt, siehe '.$urlTags['Inv_ImportSTEP'].')');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Autodesk AutoCAD');
                $list->remRows();
                $list->addRow('PDF-Export per Knopfdruck');
                $list->addRow('Alte Zeichnungslayer in alten Zeichnungen automatisch aktualisieren');
                $list->addRow('Automatisches Schneiden von Linien mit vordefiniertem Abstand f&uuml;r Rohrleitungspl&auml;ne');
                $list->addRow('Umwandlung von SHX-Texten zu normalen Texten in einer PDF-Datei mithilfe von Python (siehe '.$urlTags['ACAD_SHXRemoval'].')');
                $list->addRow('Zusammenf&uuml;hrung mehrerer PDF-Dateien zu einem PDF mithilfe von Python (siehe '.$urlTags['ACAD_MergePDF'].')');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Siemens NX');
                $list->remRows();
                $list->addRow('PDF-Export per Knopfdruck');
                $list->addRow('Einfacher Multi-Export durch eine Liste von Zeichnungsnummern');
                $list->addRow('Automatisches Bereinigen einer Zeichnung per Knopfdruck');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Word');
                $list->remRows();
                $list->addRow('Vordefinierte Vorlage per Knopfdruck &uuml;bernehmen');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Excel');
                $list->remRows();
                $list->addRow('Vordefinierte Vorlage per Knopfdruck &uuml;bernehmen');
                $list->addRow('Eigene benutzerdefinierte Funktionen f&uuml;r erweiterte Berechnungen');
                $list->addRow('Bearbeitung von Pivor-Tabellen-Quelldaten direkt durch einen Klick in die Zelle der Pivot-Tabelle (siehe '.$urlTags['Excel_PivotEdit'].')');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('PowerPoint');
                $list->remRows();
                $list->addRow('Vordefinierte Vorlage per Knopfdruck &uuml;bernehmen');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Outlook');
                $list->remRows();
                $list->addRow('Automatisches sichern von Emails in einen vordefinierten Pfad, sobald eine Email in einen Ordner verschoben wird');
                $list->addRow('Daten aus Emails extrahieren und analysieren');
                $list->addRow('Beim Eingang einer Email einen Bot starten, der diverse Aufgaben ausf&uuml;hrt');
                $list->addRow('Alle Newsletter-Abonnements auflisten, um sie einfach abbestellen zu k&ouml;nnen (siehe '.$urlTags['Outl_UnsubscribeList'].')');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Microsoft 365 (Power Automate, Power Apps, etc.)');
                $list->remRows();
                $list->addRow('Filtern und kategorisieren von eingehenden Emails in einem gemeinsamen oder privaten Postfach, sowie verschieben in vordefinierte Unterordner');
                $list->addRow('Erstellung von Powerapps, z.B. damit Benutzer ihre Daten in einer Liste sehen und bearbeiten k&ouml;nnen, ohne die Daten der jeweils anderen Mitarbeiter sehen zu k&ouml;nnen');
                $list->addRow('Email-Benachrichtigung senden, falls jemand ein Formular ausf&uuml;llt und Daten aus dem Formular automatisch in eine Liste &uuml;bernehmen');
                $list->addRow('Automatisch einen neuen Kontakt anlegen, wenn eine Anfrage oder Offerte von einem neuen Kontakt im Posteingang eingegangen ist');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Webseiten / Browser Applikationen');
                $list->remRows();
                $list->addRow('Plattformunabh&auml;ngige Applikationen zum Lernen f&uuml;r Sch&uuml;ler und Studenten  (siehe '.$urlTags['Web_LearningApps'].')');
                $list->addRow('Umsetzung von Projektideen im Web (siehe '.$urlTags['Web_QR-ID.io'].')');
                $list->addRow('Erstellung Ihrer individuellen Webseite (siehe '.$urlTags['Web_GIIT'].')');
                $mainList->addRow($list->getText());
                break;
            default: //en
                $tMainTag->setValue('Example Programming Tasks');

                $tTag = new MyTag(''); //Title List Tag
                $olTag = new MyTag('ul'); //Outer List Tag
                $ilTag = new MyTag('li'); //Inner List Tag
                $list = new MyList($tTag, $olTag, $ilTag);

                $tTag->setValue('Autodesk Inventor');
                $list->remRows();
                $list->addRow('Automatically export your PDF to a predefined path based on the data from your title block when you save');
                $list->addRow('Clean up your drawing automatically when you open it');
                $list->addRow('Update your symbols from a template with one click');
                $list->addRow('Update your title block from a template with one click (see '.$urlTags['Inv_UpdateTitleBlock'].')');
                $list->addRow('Create automatic piping with a simple button click (see '.$urlTags['Inv_AutomaticPiping'].')');
                $list->addRow('Convert an assembly to a part easily (for example, if you import a large STEP-file, see '.$urlTags['Inv_ImportSTEP'].')');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Autodesk AutoCAD');
                $list->remRows();
                $list->addRow('Export PDF with just one button click');
                $list->addRow('Update old drawing layers in old drawings automatically');
                $list->addRow('Automatically cut lines with predefined distance for your piping plans');
                $list->addRow('Use a python script to convert SHX-notes to normal text in PDF\'s (see '.$urlTags['ACAD_SHXRemoval'].')');
                $list->addRow('Merge multiple PDF\'s with one command (see '.$urlTags['ACAD_MergePDF'].')');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Siemens NX');
                $list->remRows();
                $list->addRow('Export PDF with just one button click');
                $list->addRow('Multi-export by a list of drawing numbers easily');
                $list->addRow('Automatically clean up your drawing with one button click');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Word');
                $list->remRows();
                $list->addRow('Apply a template to your file with one click');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Excel');
                $list->remRows();
                $list->addRow('Apply a template to your file with one click');
                $list->addRow('Get your own custom functions for advanced calculations');
                $list->addRow('Edit pivot table source directly via a click into the pivot table cell (see '.$urlTags['Excel_PivotEdit'].')');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('PowerPoint');
                $list->remRows();
                $list->addRow('Apply a template to your presentation with one click');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Outlook');
                $list->remRows();
                $list->addRow('Automatically save an email as a file under a predefined path when you move it into a folder');
                $list->addRow('Extract information from incoming emails automatically');
                $list->addRow('Run a bot as soon as an email arrives to perform various tasks');
                $list->addRow('List all newsletter subscriptions to unsubscribe easily (see '.$urlTags['Outl_UnsubscribeList'].')');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Microsoft 365 (Power Automate, Power Apps, etc.)');
                $list->remRows();
                $list->addRow('Filter incoming emails in a shared mailbox, move them into a subfolder and categorize them automatically');
                $list->addRow('Create a Power App to allow users to edit only their own items in a list');
                $list->addRow('On form submit, send an email and store information to a status list automatically');
                $list->addRow('Automatically create a new contact if a customer or supplier sending an email or filling out a form is not in your contacts');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Websites / Browser Applications');
                $list->remRows();
                $list->addRow('Platform independent learning-applications for students (see '.$urlTags['Web_LearningApps'].')');
                $list->addRow('Realization of web-based project ideas (see '.$urlTags['Web_QR-ID.io'].')');
                $list->addRow('Creation of you own individual website (see '.$urlTags['Web_GIIT'].')');
                $mainList->addRow($list->getText());

                break;
        }


        return $mainList->getText();
    }
    /**
     * A function to get a template 
     *
     * @param string $language Language string (de, en, de-ch, ...)
     * @return string The HTML-Text in the prefered language
     */
    public function Template_ExampleHardwareForAutomation($language) {
        $tMainTag = new MyTag('b'); //Title List Tag
        $olMainTag = new MyTag('ul'); //Outer List Tag
        $ilMainTag = new MyTag('li'); //Inner List Tag
        $mainList = new MyList($tMainTag, $olMainTag, $ilMainTag);
        
        $urlTags = array(
            'Arduino_IrrigaionSystem' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/Irrigation_System_Firmware')
            ->getText(),
            'Arduino_EMT' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/EnvironmentalMeasuringTool_Firmware')
            ->getText(),
            'Arduino_GCodeInterpreter' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/SebisSerialInterpreter')
            ->getText(),
            'STM32_StairsclimbingRobot' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/Stairsclimbingrobot_Firmware')
            ->getText(),
            'ACAD_SHXRemoval' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/PythonScripts/tree/main/SHXtoText')
            ->getText(),
            'ACAD_MergePDF' => (New MyTag('a'))
            ->setValue('Github')
            ->addAttr('target','blank')
            ->addAttr('href', 'https://github.com/SebisCodes/PythonScripts/tree/main/PDF%20Merge')
            ->getText()
        );

        switch($language) {
            case 'de':
                $tMainTag->setValue('Beispiele f&uuml;r Hardwareanwendungen');

                $tTag = new MyTag(''); //Title List Tag
                $olTag = new MyTag('ul'); //Outer List Tag
                $ilTag = new MyTag('li'); //Inner List Tag
                $list = new MyList($tTag, $olTag, $ilTag);

                $tTag->setValue('Mikrocontroller (Arduino, STM32, etc.)');
                $list->remRows();
                $list->addRow('Eine individuelle Bew&auml;sserungsanlage (siehe '.$urlTags['Arduino_IrrigaionSystem'].')');
                $list->addRow('CO2, Feuchtigkeits- und Temperaturmessung (siehe '.$urlTags['Arduino_EMT'].')');
                $list->addRow('Individueller G-Code Interpreter (siehe '.$urlTags['Arduino_GCodeInterpreter'].')');
                $list->addRow('Firmware f&uuml;r diverse Roboter (z.B. Treppensteigroboter, siehe '.$urlTags['STM32_StairsclimbingRobot'].')');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Linux Devices (Raspberry PI, Onion Omega etc.)');
                $list->remRows();
                $list->addRow('Analysieren, Berechnen und Evaluieren von Daten');
                $list->addRow('Herunterladen und Anzeigen von z.B. Wetter- oder Aktiendaten');
                $list->addRow('Individuelle Roboterfirmware, z.B. mithilfe von ROS');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Android Devices');
                $list->remRows();
                $list->addRow('Spieleentwicklung');
                $list->addRow('Individuelle Apps f&uuml;rs Unternehmen');
                $list->addRow('Eine App, um Ihren Shop oder ihre Webseite auf dem Smartphone zug&auml;nglicher zu machen');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Windows Devices');
                $list->remRows();
                $list->addRow('Umwandlung von SHX-Texten zu normalen Texten in einer PDF-Datei mithilfe von Python (siehe '.$urlTags['ACAD_SHXRemoval'].')');
                $list->addRow('Zusammenf&uuml;hrung mehrerer PDF-Dateien zu einem PDF mithilfe von Python (siehe '.$urlTags['ACAD_MergePDF'].')');
                $list->addRow('Einfache organisation einer Ordnerstruktur, sowie Dateibenennung');
                $list->addRow('Integrierte Apps f&uuml;r Microsoft Office zur Steigerung Ihrer Produktivit&auml;t');
                $mainList->addRow($list->getText());
                break;
            default: //en
                $tMainTag->setValue('Examples for Hardwareapplications');

                $tTag = new MyTag(''); //Title List Tag
                $olTag = new MyTag('ul'); //Outer List Tag
                $ilTag = new MyTag('li'); //Inner List Tag
                $list = new MyList($tTag, $olTag, $ilTag);

                $tTag->setValue('Microcontroller (Arduino, STM32, etc.)');
                $list->remRows();
                $list->addRow('An individual irrigation system (see '.$urlTags['Arduino_IrrigaionSystem'].')');
                $list->addRow('CO2, humidity and temperature level measurement (see '.$urlTags['Arduino_EMT'].')');
                $list->addRow('Custom g-code-interpreter for your machine (see '.$urlTags['Arduino_GCodeInterpreter'].')');
                $list->addRow('Stairsclimbing robot firmware (see '.$urlTags['STM32_StairsclimbingRobot'].')');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Linux Devices (Raspberry PI, Onion Omega etc.)');
                $list->remRows();
                $list->addRow('Analyze, calculate and evaluate data with powerful codes');
                $list->addRow('Download and display the most important information about weather or stock market on a screen');
                $list->addRow('Robotics applications using ROS');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Android Devices');
                $list->remRows();
                $list->addRow('Game development');
                $list->addRow('Individuelle Apps f&uuml;r Ihr Unternehmen');
                $list->addRow('Apps zur Navigation eines Shops oder einer Webseite');
                $mainList->addRow($list->getText());
                
                $tTag->setValue('Windows Devices');
                $list->remRows();
                $list->addRow('Use a python script to convert SHX-notes to normal text in PDF\'s (see '.$urlTags['ACAD_SHXRemoval'].')');
                $list->addRow('Merge multiple PDF\'s with one command (see '.$urlTags['ACAD_MergePDF'].')');
                $list->addRow('Store your files in a path defined by a predefined pattern and organize them easily');
                $list->addRow('Integrated app for Microsoft Office for enhancement of your productivity');
                $mainList->addRow($list->getText());

                break;
        }
        return $mainList->getText();
    }
    
    /**
     * A function to get a template 
     *
     * @param string $language Language string (de, en, de-ch, ...)
     * @return string The HTML-Text in the prefered language
     */
    public function Template_RequestAnOffer($language) {
        $a_Tag = (new MyTag('a'))
        ->addAttr('target','blank')
        ->addAttr('class',' text-decoration-none')
        ->addAttr('href', 'https://forms.office.com/Pages/ResponsePage.aspx?id=RY2eRvNCY0WDdGsJN27jWVtEzdGovTVGlVBx-J3FmFRUNVNPQzIwWjRYMVE4SVFTWFYxQ1c3Ukg2RyQlQCN0PWcu');
        $img_Tag = (new MyTag('img'))
        ->addAttr('class', 'img-fluid img-fit qr')
        ->addAttr('src', './src/img/qr.png')
        ->addAttr('alt', 'QR-code for a request');

        $main_Tag = (new MyTag('main'))->addAttr('class', 'px-3');
        $h_Tag = (new MyTag('h2'))->addAttr('class', 'text-uppercase');
        $small_Tag = new MyTag('small');
        $i_Tag = (new MyTag('i'))->addAttr('class','text-decoration-underline');

        switch($language) {
            case 'de':
                $h_Tag->setValue('Angebot Anfragen');
                $i_Tag->setValue('Klicken Sie hier oder scannen Sie den QR-Code');
                break;
            default:
                $h_Tag->setValue('Request an Offer');
                $i_Tag->setValue('Click here or scan the qr-code');
                break;
        }
        $main_Tag->append($h_Tag->getText());
        $main_Tag->append($small_Tag->setValue($i_Tag->getText())->getText());
        $main_Tag->append('<br />');
        $main_Tag->append('<br />');
        $main_Tag->append($img_Tag->getText());
        $a_Tag->setValue($main_Tag->getText());
        return $a_Tag->getText();
    }
    /**
     * A function to get a template 
     *
     * @param string $language Language string (de, en, de-ch, ...)
     * @return string The HTML-Text in the prefered language
     */
    public function Template_SeeAlsoQRID($language) {
        $a_Tag = (new MyTag('a'))
        ->addAttr('target','blank')
        ->addAttr('class',' text-decoration-none')
        ->addAttr('href', 'https://qr-id.io');
        $img_Tag = (new MyTag('img'))
        ->addAttr('class', 'img-fluid img-fit qr')
        ->addAttr('src', './src/img/QR-ID_code.png')
        ->addAttr('alt', 'QR-code for a request');

        $main_Tag = (new MyTag('main'))->addAttr('class', 'px-3');
        $h_Tag = (new MyTag('h2'))->addAttr('class', 'text-uppercase');
        $small_Tag = new MyTag('small');
        $i_Tag = (new MyTag('i'))->addAttr('class','text-decoration-underline');

        switch($language) {
            case 'de':
                $h_Tag->setValue('Siehe auch QR-ID.io');
                $i_Tag->setValue('Klicken Sie hier oder scannen Sie den QR-Code');
                break;
            default:
                $h_Tag->setValue('See also qr-id.io');
                $i_Tag->setValue('Click here or scan the qr-code');
                break;
        }
        $main_Tag->append($h_Tag->getText());
        $main_Tag->append($small_Tag->setValue($i_Tag->getText())->getText());
        $main_Tag->append('<br />');
        $main_Tag->append('<br />');
        $main_Tag->append($img_Tag->getText());
        $a_Tag->setValue($main_Tag->getText());
        return $a_Tag->getText();
    }

    /**
     * A function to get a template 
     *
     * @param string $language Language string (de, en, de-ch, ...)
     * @return string The HTML-Text in the prefered language
     */
    public function Template_Impress($language) {
        $outputText = "";
        $hTag = (new MyTag('h6'))->addAttr('class','text-uppercase fw-bold mb-4')->setValue('Gr&uuml;nwald Innovation'); 
        
        $ps_aTag = ((New MyTag('a'))
        ->setValue('./Privacy_Statement.pdf')
        ->addAttr('target','blank')
        ->addAttr('href', './Privacy_Statement.pdf'));

        $outputText .= $hTag->getText();
        $outputText .= 'Sebastian Gr&uuml;nwald<br />';
        $outputText .= 'Birchstrasse 6<br />';
        $outputText .= '8212 Neuhausen am Rheinfall<br />';
        switch($language) {
            case 'de':
                $outputText .= 'Schweiz';
                $ps_aTag->setValue('Datenschutzerkl&auml;rung');
                break;
            default:
                $outputText .= 'Switzerland';
                $ps_aTag->setValue('Privacy Statement');
                break;
        }
        $outputText .= '<br />';
        $outputText .= '<br />';
        $outputText .= (New MyTag('u'))->setValue($ps_aTag->getText())->getText();
        return $outputText;
    }
    
    /**
     * A function to get a template 
     *
     * @param string $language Language string (de, en, de-ch, ...)
     * @return string The HTML-Text in the prefered language
     */
    public function Template_Contact($language) {
        $outputText = "";
        $hTag = (new MyTag('h6'))->addAttr('class','text-uppercase fw-bold mb-4'); 
        switch($language) {
            case 'de':
                $hTag->setValue('Kontakt');
                break;
            default: //en
                $hTag->setValue('Contact');
                break;
        }
        $outputText .= $hTag->getText();
        $urlTags = array(
            'info' => (New MyTag('a'))
            ->setValue('info@giit.ch')
            ->addAttr('href', 'mailto:info@giit.ch')
            ->getText(),
            'support' => (New MyTag('a'))
            ->setValue('support@giit.ch')
            ->addAttr('href', 'mailto:support@giit.ch')
            ->getText(),
            'privacy' => (New MyTag('a'))
            ->setValue('privacy@giit.ch')
            ->addAttr('href', 'mailto:privacy@giit.ch')
            ->getText(),
            'faq' => (New MyTag('a'))
            ->setValue('faq@giit.ch')
            ->addAttr('href', 'mailto:faq@giit.ch')
            ->getText()
        );
        foreach($urlTags As $name=>$value) {
            $outputText .= (new MyTag('p'))->SetValue($value)->getText();
        }
        return $outputText;
    }
}
?>