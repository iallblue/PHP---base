### �ű�
***
*   mysql��ز���

```
//��¼
mysql -u root -p

//�����û�(test.* ���ݿ�test�µ����б� on test �����ݿ⣬to mytest ��Ӵ������ by ��test����Ĭ������ )
grant select,delete,update,insert on test.* on test to mytest identified by 'test'

//�ڽű���ʹ��mysql����
MYSQL=$(which mysql)
pass=$(cat /pass)
$MYSQL -u test -p$pass <<EOF
show databases;
EOF
 
```