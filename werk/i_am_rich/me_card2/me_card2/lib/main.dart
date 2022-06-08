import 'package:flutter/material.dart';

void main() => runApp(MiCard2());

class MiCard2 extends StatelessWidget {
  const MiCard2({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      home: Scaffold(
        backgroundColor: Colors.teal,
        body: SafeArea(
          child: Center(
            child: Column(
              children: [
                CircleAvatar(
                  backgroundColor: Colors.transparent,
                  foregroundImage: AssetImage('images/'),
                )
              ],
            ),
          ),
        ),
      ),
    );
  }
}
