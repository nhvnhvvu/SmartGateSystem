
#include <WiFi.h>
#include <PubSubClient.h>
#include<SPI.h>
#include<MFRC522.h>
 
const char* ssid = "3Cs_LAB";
const char* password = "3cslabsince2015";
 
#define MQTT_SERVER "broker.hivemq.com"
#define MQTT_PORT 1883
#define MQTT_USER "Vulcan121"
#define MQTT_PASSWORD "Vulcan121"
#define SS_PIN 15
#define RST_PIN 2
MFRC522 mfrc522(SS_PIN,RST_PIN); // Create MFRC522 instance.
 
 char readCard[4];
String tagID = "";
 bool stateRF ="0";
#define PUB "3CSLAB/AIDAYS/receive"
#define SUB "3CSLAB/AIDAYS/new"
 
unsigned long previousMillis = 0; 
const long interval = 5000;
 
WiFiClient wifiClient;
PubSubClient client(wifiClient);
 
 
void setup_wifi() {
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}
 
void connect_to_broker() {
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");
    String clientId = "ESP32";
    clientId += String(random(0xffff), HEX);
    if (client.connect(clientId.c_str())) {
      Serial.println("connected");
      client.subscribe(SUB);
    
    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 2 seconds");
      delay(2000);
    }
  }
}


 
void callback(char* topic, byte *payload, unsigned int length) {
  char status[20];
  Serial.println("-------new message from broker-----");
  Serial.print("topic: ");
  Serial.println(topic);
  Serial.print("message: ");
  Serial.write(payload, length);
  Serial.println();
  for(int i = 0; i<length; i++)
  {
    status[i] = payload[i];
  }
  Serial.print(status);
 int indexA = String(status).indexOf('A');
  int indexB = String(status).indexOf('B');
  Serial.println(indexA);
  Serial.println(indexB);

  if (indexA != -1 && indexB != -1 && indexA < indexB) {
    String newString = String(status).substring(indexA + 1, indexB);
    Serial.println();
    Serial.println(newString);
    if(newString == "09062023")
    {
      stateRF= 1;
    }
  };

  //Serial.println(status);
   
}
 
void setup() {
  Serial.begin(9600);
  Serial.setTimeout(500);
  setup_wifi();
  client.setServer(MQTT_SERVER, MQTT_PORT );
  client.setCallback(callback);
  connect_to_broker();
  Serial.println("Start transfer");
  SPI.begin();     // Initiate  SPI bus
  mfrc522.PCD_Init(); // Initiate MFRC522
 Serial.println("Approximate your card to the reader...");
 Serial.println();
}

uint8_t getID() {
  // Getting ready for Reading PICCs
  if ( ! mfrc522.PICC_IsNewCardPresent()) { //If a new PICC placed to RFID reader continue
    return 0;
  }
  if ( ! mfrc522.PICC_ReadCardSerial()) {   //Since a PICC placed get Serial and continue
    return 0;
  }
  tagID = "";
  for ( uint8_t i = 0; i < 4; i++) {  // The MIFARE PICCs that we use have 4 byte UID
    readCard[i] = mfrc522.uid.uidByte[i];
    tagID.concat(String(mfrc522.uid.uidByte[i], HEX)); // Adds the 4 bytes in a single String variable
  }
  Serial.print(tagID);

if(tagID !=""){
 client.publish(PUB, readCard);
 Serial.println(readCard);
  stateRF = 0;
}
  mfrc522.PICC_HaltA(); // Stop reading
  return 1;
}
  
void loop() {
  client.loop();
  if (!client.connected()) {
    connect_to_broker();
  }
  client.publish(PUB,"111");
  delay(1000);
  if (stateRF==1)
  {
    getID();
  }
 //getID();



}