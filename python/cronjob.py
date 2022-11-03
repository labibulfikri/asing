import mysql.connector 
import time
import telepot
import signal

token = '896501245:AAG7CFqIhcQfcCWXv-KZMrb4EF8Ao9790TI'
TelegramBot = telepot.Bot(token)
# TelegramBot = token
print (TelegramBot.getMe())

 

def insert_q (id,cron_no,cron_agenda,cron_tgl,cron_tergugat,cron_penggugat):
    myDB = mysql.connector.connect(
        host = "localhost",
        user = "dpbt_user",
        passwd = "dpbt_123",
        charset='utf8', 
        database = "db_perkara"
    )
    print(myDB)

    mycursor = myDB.cursor()

    # print ("select count(cron_jadwal_id) from t_cron where cron_jadwal_id ="+str(id)+" and  cron_perkara_no ='"+str(cron_no)+"'")
    # mycursor.execute("select count(cron_jadwal_id) from t_cron where cron_jadwal_id ="+str(id)+" and cron_perkara_no ='"+str(cron_no)+"' and cron_agenda ='"+str(cron_agenda)+"' and cron_tgl ='"+str(cron_tgl)+"'")
    mycursor.execute("select count(cron_jadwal_id) from t_cron join t_jadwal on jadwal_id = cron_jadwal_id where jadwal_tgl = cron_tgl and cron_jadwal_id ='"+str(id)+"' and cron_perkara_no ='"+str(cron_no)+"'")
    
    myresult= mycursor.fetchall()

    for result in myresult:
        if (result [0] == 0  ):
            strMSG = "Jadwal Sidang Tanggal : "+str(cron_tgl)+" \n Nomor Perkara :'"+str(cron_no)+"' \n Agenda Sidang :" +str(cron_agenda)+" \n Pihak I :'"+str(cron_tergugat)+" \n Pihak II:'"+str(cron_penggugat)+" \n Cek Disini : http://aseng.surabaya.go.id/"
            TelegramBot.sendMessage(-391498494, strMSG)

            # print ("insert into t_cron (cron_jadwal_id,cron_perkara_no) VALUES ("+str(id)+" , '"+str(cron_no)+"')")
            mycursor.execute("insert into t_cron (cron_jadwal_id,cron_perkara_no,cron_agenda,cron_tgl,cron_tergugat,cron_penggugat) VALUES ('"+str(id)+"' , '"+str(cron_no)+"', '"+str(cron_agenda)+"', '"+str(cron_tgl)+"', '"+str(cron_tergugat)+"', '"+str(cron_penggugat)+"')")
            myDB.commit()

    

def cek ():
    myDB = mysql.connector.connect(
        host = "localhost",
        user = "dpbt_user",
        passwd = "dpbt_123",
        charset='utf8',
        database = "db_perkara"
    )  
    mycursor = myDB.cursor()
    mycursor.execute("select jadwal_id,perkara_no,jadwal_judul,jadwal_tgl,perkara_tergugat,perkara_penggugat, DATEDIFF( jadwal_tgl, now()) AS jadwal_tglnya from t_jadwal JOIN t_perkara on perkara_id = jadwal_perkara_id where jadwal_tgl >= now()-interval 1 day  and jadwal_tgl <= now()+interval 3 day and jadwal_aktiv='y'")
    myresult_jadwal = mycursor.fetchall()
 
    for result in myresult_jadwal: 
        print("Jadwal"+str (result[3]))
        insert_q(result[0],result[1],result[2],result[3],result[4],result[5])
 

while (True):
   cek()
   time.sleep(5)
	