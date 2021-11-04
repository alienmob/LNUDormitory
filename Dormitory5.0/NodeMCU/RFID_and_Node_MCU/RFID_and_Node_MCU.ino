#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266HTTPClient.h>
#include "ESP8266WiFi.h"
#include <WiFiClient.h>

WiFiClient wifiClient;

#define SS_PIN D2
#define RST_PIN D1 

int readsuccess;
byte readcard[4];
char str[32] = "";
String StrUID;

const char* ssid = "GitHub";
const char* password = "LE-R19-000956";

IPAddress server(74, 125, 115, 105); // Google

MFRC522 mfrc522(SS_PIN, RST_PIN);
 
void setup() {
  WiFi.mode(WIFI_STA);
   
  Serial.begin(9600);

  Serial.println("Attempting to connect to network");
  Serial.print("SSID: ");
  Serial.println(ssid);
  initWifi();
  
  SPI.begin();
  mfrc522.PCD_Init();
}

void initWifi(){
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
     delay(500);
     Serial.print(".");
  }
  //print a new line, then print WiFi connected and the IP address
  if(WiFi.status() == WL_CONNECTED) {
    Serial.println("");
    Serial.println("WiFi connected");
    
    Serial.println(WiFi.localIP());  
  }
  
}

int getid() {  
  if(!mfrc522.PICC_IsNewCardPresent()) {
    return 0;
  }
  if(!mfrc522.PICC_ReadCardSerial()) {
    return 0;
  }
 
  
  Serial.print("THE UID OF THE SCANNED CARD IS : ");
  
  for(int i=0;i<4;i++){
    readcard[i]=mfrc522.uid.uidByte[i]; //storing the UID of the tag in readcard
    array_to_string(readcard, 4, str);
    StrUID = str;
  }
  mfrc522.PICC_HaltA();
  return 1;
}

void array_to_string(byte array[], unsigned int len, char buffer[]) {
    for (unsigned int i = 0; i < len; i++)
    {
        byte nib1 = (array[i] >> 4) & 0x0F;
        byte nib2 = (array[i] >> 0) & 0x0F;
        buffer[i*2+0] = nib1  < 0xA ? '0' + nib1  : 'A' + nib1  - 0xA;
        buffer[i*2+1] = nib2  < 0xA ? '0' + nib2  : 'A' + nib2  - 0xA;
    }
    buffer[len*2] = '\0';
}

void sendRfidLog() {

   readsuccess = getid();
 
  if(readsuccess) {  
    Serial.println("Success getting id");
    HTTPClient http;    //Declare object of class HTTPClient
 
    String UIDresultSend;
    UIDresultSend = StrUID;

    String postData = "cardid=" + String(UIDresultSend) + "&action=insertRecord";
    http.begin(wifiClient, "http://192.168.254.198/Dormitory5.0/admin/urfid.php"); //Specify request destination
    http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //Specify content-type header
   
    int httpCode = http.POST(postData);   //Send the request
    String payload = http.getString();    //Get the response payload
  
    Serial.println(UIDresultSend);
    Serial.println(httpCode);   //Print HTTP return code
    Serial.println(payload);    //Print request response payload
    
    http.end();  //Close connection
    delay(1000);
  
  }
  else {
    Serial.println("No card is being read");
    Serial.println(readsuccess);
  }
}


void loop() {
  sendRfidLog();
  delay(500);
}
