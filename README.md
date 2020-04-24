# di
di注入，实现对工厂注入，实现对工具类注入，客户端可以通过DI容器利用注入的工厂类操作工具类。
------------
## **目录结构说明**
------------
- A.php --工具类A
- B.php --工具类B
- Client.php --客户端类
- Di.php --DI 容器类
- Factory.php --工厂类
- interfaceInfo.php --工具接口类

------------


## 1. **为什么要研究DI容器类？**
因为目前的主流框架都在用DI容器。DI容器逐渐替代了以前使用的工厂类。
## 2. **总结**
- 本例A B Factory 都实现了工具接口类，设计的初衷是 client 通过Factory 可以得到A和B的一切功能，实现解耦，而不用直接调用A和B。
- 传统的做法就是使用Factory 直接调用Factory.但是一旦Factory 变化或者改变就不容易修改。造成了client 和Factory的耦合。
- 为了解决这个问题，加入了Di 类。用Di类绑定了Factory 和工具类。从而实现了client 通过Di 就可以直接使用工具类了。而不用关心 Factory 和工具类具体的实现细节。
