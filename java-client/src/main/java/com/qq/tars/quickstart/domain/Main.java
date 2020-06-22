/**
 * Tencent is pleased to support the open source community by making Tars available.
 *
 * Copyright (C) 2016 THL A29 Limited, a Tencent company. All rights reserved.
 *
 * Licensed under the BSD 3-Clause License (the "License"); you may not use this file except
 * in compliance with the License. You may obtain a copy of the License at
 *
 * https://opensource.org/licenses/BSD-3-Clause
 *
 * Unless required by applicable law or agreed to in writing, software distributed
 * under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
 * CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
 */
package com.qq.tars.quickstart.domain;

import com.qq.tars.client.Communicator;
import com.qq.tars.client.CommunicatorConfig;
import com.qq.tars.client.CommunicatorFactory;
import com.qq.tars.quickstart.client.testapp.HelloPrx;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

public class Main {

    private static final Logger logger = LoggerFactory.getLogger(Main.class);

    public static void main(String[] args) throws InterruptedException {
        // 从本地启动的配置
        CommunicatorConfig cfg = new CommunicatorConfig();
        // 从本地启动的Communcator
        Communicator communicator = CommunicatorFactory.getInstance().getCommunicator(cfg);
        //warn 若是部署在tars平台启动的， 只能使用下面的构造器获取communcator
        //Communicator communicator = CommunicatorFactory.getInstance().getCommunicator();
        HelloPrx proxy = communicator.stringToProxy(HelloPrx.class, "PHPDemo.PHPTcpServer.HelloObj@tcp -h 127.0.0.1 -p 18081 -t 3000");
        //同步调用
        String ret = proxy.hello("Hello World");
        System.out.println(ret);

        communicator.shutdown();
    }
}
