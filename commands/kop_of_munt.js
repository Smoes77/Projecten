module.exports.run = async (bot, message, args) => {

    var values = ["Kop", "Munt"];

    var result = values[Math.floor(Math.random() * values.length)]; 

    return message.channel.send(`🎭 Je hebt **${result}** gegooid.`);

}

module.exports.help = {
    name: "flip",
    category: "general",
    description: "Kop of munt"
    
}