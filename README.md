NOTE: This is a old website version of my Smart Gate System, including Local WebServer code and code for UID-reader device (for creating new member card).
The lastest one had been lost due to the broken of my laptop. This version lack of KPT-accounting function and not really stable, but still a usable web for managering

* To run this web:
  Install XAMPP 
  Create a new database named :aiday_database
  Create table 'Member'including 12 rows
    STT (auto increasing)
    FULLNAME
    EMAIL
    PHONE_NUMBER
    BIRTH
    NGANH
    KHOA
    MSSV
    UID
    DATE
    TIME
  Create table 'history' including 5 rows 
    DATE
    NAME
    TIME
    NOTE
    UID
  Create table 'realtime' including 3 rows
    STT
    MSSV
    NAME
* To run ESP32 code for UID reader device:
    SDA D15
    SCK D18
    MOSI D23
    MISO D19
    RST D02

    
    
