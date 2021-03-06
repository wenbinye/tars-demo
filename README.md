# PHP TARS Framework Demo

## Tars RPC 服务示例

tcp-server 是一个简单的 tars 协议的 rpc 服务。

使用 `composer package` 打包后就可以上传到 TARS 平台发布。

本地也可以通过以下命令启动测试：

```bash
cp config.conf.example config.conf
sed -i 's/{tarsnode}/192.168.0.108/' config.conf
php src/index.php --config config.conf
```

启动前请修改 config.conf

## HTTP 服务示例

http-server 是使用 [Slim](https://www.slimframework.com/) 的 HTTP 服务。

## Tars 客户端

tars-java-client 是调用 TarsJava 中 examples 服务客户端。

需要注意的是，tars java 生成代码中函数参数是没有名字的，必须使用 args0, args1 等参数名。
所以要么客户端 `@TarsParameter` 中修改参数名为 args0, args1...，要么修改服务端
接口参数添加注解 `@TarsMethodParameter`。

## 使用 tars-cli 部署

使用 [tars-cli](https://github.com/wenbinye/tars-cli) 可以通过命令行快速部署。

首先需要配置 web 服务地址：

```bash
$ tars configure
```

添加模板：

```bash
$ tars template:save --name wenbinye.php --parent tars.tarsphp.default resources/wenbinye.tarsphp.xml
```

添加服务部署：

```bash
tars deploy --template > /tmp/deploy.json
```

修改  `/tmp/deploy.json` 文件中参数。

```bash
tars deploy --json /tmp/deploy.json
```

上传并发布服务：

```bash
tars patch PHPDemo PHPTcpServer_20200510003249.tar.gz
```
