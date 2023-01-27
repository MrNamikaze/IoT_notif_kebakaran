/*
www.arduinopoint.com 
Fire Alarm System 
*/
#include <SoftwareSerial.h>
int redLed1 = 4;
int redLed2 = 3;
int greenLed = 8;
int buzzer1 = 5; //PWM (~) pin
int buzzer2 = 6; //PWM (~) pin
int gasPin = A0;
int tempPin = A1;
int flamePin = 2;
int val = 0;
// Your threshold value
int gasSensorThres = 250;
// esp8266
SoftwareSerial espSerial(9, 10);
String str;
String ruangan = "1";
void setup() {
  pinMode(redLed1, OUTPUT);  
  pinMode(redLed2, OUTPUT);
  pinMode(greenLed, OUTPUT);
  pinMode(buzzer1, OUTPUT);
  pinMode(buzzer2, OUTPUT);
  pinMode(gasPin, INPUT);
  pinMode(tempPin, INPUT);
  pinMode(flamePin, INPUT);
  Serial.begin(115200);
  espSerial.begin(115200);
  delay(2000);
  // setWifi(ssid, pass);
}

void loop() {
  int gasSensor = analogRead(gasPin);
  int flameSensor = digitalRead(flamePin);
  val = analogRead(tempPin);
  float mv = ( val/1024.0)*5000;
  float cel = mv/10;
  float farh = (cel*9)/5 + 32;
  Serial.print("gasPin Value: ");
  Serial.println(gasSensor);
  Serial.print("flamePin Value: ");
  Serial.println(flameSensor);
  Serial.print("TEMPRATURE = ");
  Serial.print(cel);
  Serial.print("*C");
  Serial.println();
  
  if (gasSensor > gasSensorThres  && flameSensor==LOW){
   digitalWrite(redLed1, HIGH);
    tone(buzzer1, 10); //the buzzer sound frequency at 5000 Hz
    digitalWrite(redLed2, HIGH);
    tone(buzzer2, 10); //the buzzer sound frequency at 5000 Hz
    digitalWrite(greenLed, LOW);
    str =String(ruangan)+String("+")+String("4")+String("+")+String(gasSensor)+String("+")+String(flameSensor)+String("+")+String(cel);
    espSerial.println(str);
    delay(5000);
  }
   else if (gasSensor > gasSensorThres)
  {
    digitalWrite(redLed1, HIGH);
    tone(buzzer1, 10); //the buzzer sound frequency at 5000 Hz
    digitalWrite(redLed2, LOW);
    noTone(buzzer2);
    digitalWrite(greenLed, LOW);
    str =String(ruangan)+String("+")+String("3")+String("+")+String(gasSensor)+String("+")+String(flameSensor)+String("+")+String(cel);
    espSerial.println(str);
    delay(5000);
  }
  else if (flameSensor==LOW){ // HIGH MEANS NO FLAME
    digitalWrite(redLed1, LOW);
    noTone(buzzer1);
    digitalWrite(redLed2, HIGH);
    tone(buzzer2, 10); //the buzzer sound frequency at 5000 Hz
    digitalWrite(greenLed, LOW);
    str =String(ruangan)+String("+")+String("2")+String("+")+String(gasSensor)+String("+")+String(flameSensor)+String("+")+String(cel);
    espSerial.println(str);
    delay(5000);
    }
  
  else
  {
    digitalWrite(redLed1, LOW);
    digitalWrite(redLed2, LOW);
    noTone(buzzer1);
    noTone(buzzer2);
    digitalWrite(greenLed, HIGH);
    str =String(ruangan)+String("+")+String("1")+String("+")+String(gasSensor)+String("+")+String(flameSensor)+String("+")+String(cel);
    espSerial.println(str); 
  }
  
  delay(5000);
}
