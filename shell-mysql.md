### 脚本
***
*   mysql相关操作

```
//登录
mysql -u root -p

//分配用户(test.* 数据库test下的所有表 on test 是数据库，to mytest 是哟几个户 by ’test‘是默认密码 )
grant select,delete,update,insert on test.* on test to mytest identified by 'test'

//在脚本中使用mysql命令
MYSQL=$(which mysql)
pass=$(cat /pass)
$MYSQL -u test -p$pass <<EOF
show databases;
EOF
 
```